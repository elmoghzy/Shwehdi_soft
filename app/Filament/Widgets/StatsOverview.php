<?php

namespace App\Filament\Widgets;

use App\Models\Bundle;
use App\Models\Category;
use App\Models\Lead;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalProducts = Product::count();
        $inStockProducts = Product::where('is_in_stock', true)->count();
        $totalCategories = Category::count();
        $totalBundles = Bundle::count();
        $totalLeads = Lead::count();
        $newLeads = Lead::where('status', Lead::STATUS_NEW)->count();
        $contactedLeads = Lead::where('status', Lead::STATUS_CONTACTED)->count();
        $soldLeads = Lead::where('status', Lead::STATUS_SOLD)->count();

        return [
            Stat::make('إجمالي المنتجات', $totalProducts)
                ->description($inStockProducts . ' متوفر حالياً')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('info')
                ->chart([4, 6, 8, 5, 7, $totalProducts]),

            Stat::make('الأقسام', $totalCategories)
                ->description('أقسام الكتالوج')
                ->descriptionIcon('heroicon-o-tag')
                ->color('warning'),

            Stat::make('الباقات', $totalBundles)
                ->description('عروض وباقات نشطة')
                ->descriptionIcon('heroicon-o-gift')
                ->color('success'),

            Stat::make('العملاء المحتملين', $totalLeads)
                ->description($newLeads . ' جديد · ' . $contactedLeads . ' تم التواصل · ' . $soldLeads . ' تم البيع')
                ->descriptionIcon('heroicon-o-user-group')
                ->color($newLeads > 0 ? 'danger' : 'success')
                ->chart([2, 4, 3, 5, 6, $totalLeads]),
        ];
    }
}
