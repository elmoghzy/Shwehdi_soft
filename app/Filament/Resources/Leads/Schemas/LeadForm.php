<?php

namespace App\Filament\Resources\Leads\Schemas;

use App\Models\Lead;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client_name')
                    ->label('اسم العميل')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->required()
                    ->maxLength(30),
                TextInput::make('interested_in')
                    ->label('مهتم بـ')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->label('الحالة')
                    ->options(Lead::statusOptions())
                    ->default(Lead::STATUS_NEW)
                    ->required(),
                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->rows(5),
            ]);
    }
}
