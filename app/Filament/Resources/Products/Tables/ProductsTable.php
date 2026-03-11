<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('updated_at', 'desc')
            ->columns([
                ImageColumn::make('main_image')
                    ->label('الصورة')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl('https://placehold.co/80x80/1a1a2e/ff7a1a?text=P'),
                TextColumn::make('name')
                    ->label('اسم المنتج')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('category.name')
                    ->label('القسم')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                TextColumn::make('brand')
                    ->label('الماركة')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('price')
                    ->label('السعر')
                    ->money('LYD')
                    ->sortable()
                    ->color('success')
                    ->weight('bold'),
                IconColumn::make('is_in_stock')
                    ->label('متوفر')
                    ->boolean(),
                TextColumn::make('updated_at')
                    ->label('آخر تعديل')
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('القسم')
                    ->relationship('category', 'name'),
                TernaryFilter::make('is_in_stock')
                    ->label('التوفر')
                    ->trueLabel('متوفر فقط')
                    ->falseLabel('غير متوفر فقط'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->label('+ منتج جديد'),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
