<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestLeads extends TableWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'آخر الطلبات الواردة';

    public function table(Table $table): Table
    {
        return $table
            ->query(Lead::query()->latest()->limit(10))
            ->columns([
                TextColumn::make('client_name')
                    ->label('العميل')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('phone')
                    ->label('الهاتف')
                    ->copyable()
                    ->icon('heroicon-o-phone'),
                TextColumn::make('interested_in')
                    ->label('مهتم بـ')
                    ->limit(30)
                    ->badge()
                    ->color('info'),
                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Lead::statusOptions()[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        Lead::STATUS_NEW => 'danger',
                        Lead::STATUS_CONTACTED => 'warning',
                        Lead::STATUS_SOLD => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('التاريخ')
                    ->since(),
            ])
            ->paginated(false);
    }
}
