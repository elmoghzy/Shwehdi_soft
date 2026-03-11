<?php

namespace App\Filament\Resources\Bundles\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('quantity')
                    ->label('الكمية')
                    ->numeric()
                    ->minValue(1)
                    ->default(1)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('المنتج')
                    ->searchable(),
                TextColumn::make('brand')
                    ->label('الماركة')
                    ->searchable(),
                TextColumn::make('pivot.quantity')
                    ->label('الكمية'),
            ])
            ->filters([])
            ->headerActions([
                AttachAction::make()
                    ->label('ربط منتج')
                    ->preloadRecordSelect()
                    ->schema(fn (AttachAction $action): array => [
                        $action->getRecordSelect()
                            ->label('المنتج')
                            ->required(),
                        TextInput::make('quantity')
                            ->label('الكمية')
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->required(),
                    ]),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('تعديل الكمية'),
                DetachAction::make()
                    ->label('إزالة من الباقة'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DetachBulkAction::make(),
                ]),
            ]);
    }
}
