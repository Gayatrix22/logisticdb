<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat; // ✅ correct

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Blogs', Blog::count())
                ->icon('heroicon-o-document-text')
                ->color('success'),

            Stat::make('Contacts', Contact::count())
                ->icon('heroicon-o-envelope')
                ->color('warning'),
        ];
    }
}