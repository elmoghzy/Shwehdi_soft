<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('المعلومات الأساسية')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('اسم المنتج')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->alphaDash()
                                ->maxLength(255)
                                ->unique(ignoreRecord: true),
                        ]),
                        Grid::make(2)->schema([
                            Select::make('category_id')
                                ->label('القسم')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->createOptionForm([
                                    TextInput::make('name')->label('اسم القسم')->required(),
                                    TextInput::make('slug')->label('Slug')->required()->alphaDash(),
                                ])
                                ->required(),
                            TextInput::make('brand')
                                ->label('الماركة')
                                ->maxLength(255),
                        ]),
                        Textarea::make('description')
                            ->label('الوصف')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('السعر والتوفر')
                    ->icon('heroicon-o-currency-dollar')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('price')
                                ->label('السعر (د.ل)')
                                ->numeric()
                                ->minValue(0)
                                ->step('0.01')
                                ->prefix('د.ل'),
                            Toggle::make('is_in_stock')
                                ->label('متوفر بالمخزون')
                                ->default(true)
                                ->inline(false),
                        ]),
                    ]),

                Section::make('المواصفات الفنية')
                    ->icon('heroicon-o-cpu-chip')
                    ->collapsible()
                    ->schema([
                        KeyValue::make('specs')
                            ->label('المواصفات')
                            ->keyLabel('اسم الخاصية')
                            ->valueLabel('القيمة')
                            ->addActionLabel('+ إضافة خاصية')
                            ->reorderable()
                            ->afterStateHydrated(function ($component, $state) {
                                if (is_array($state)) {
                                    $flat = [];
                                    foreach ($state as $k => $v) {
                                        $flat[$k] = is_array($v) ? implode('، ', $v) : (string) $v;
                                    }
                                    $component->state($flat);
                                }
                            }),
                    ]),

                Section::make('صورة المنتج')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('main_image')
                            ->label('الصورة الرئيسية')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml', 'image/gif'])
                            ->directory('images/products')
                            ->disk('public')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->columnSpanFull()
                            ->dehydrated(fn ($state) => filled($state)),
                    ]),
            ]);
    }
}
