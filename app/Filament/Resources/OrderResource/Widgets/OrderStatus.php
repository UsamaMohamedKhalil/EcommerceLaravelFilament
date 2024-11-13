<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class OrderStatus extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Orders', Order::query()->where('status','new')->count()),
            Stat::make('Delivered', Order::query()->where('status','delivered')->count()),
            Stat::make('Order Shipped', Order::query()->where('status','shipped')->count()),
            Stat::make('Total Price', Number::currency(Order::query()->sum('grand_total'),'EGP'))
            
        ];
    }
}
