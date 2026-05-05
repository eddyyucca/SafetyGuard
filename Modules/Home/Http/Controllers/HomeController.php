<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home::index', [
            'context' => [
                'shift' => 'Shift A',
                'date' => now()->format('d M Y'),
            ],
            'stats' => [
                [
                    'label' => 'Fit To Work',
                    'value' => '187',
                    'meta' => '12 perlu review supervisor',
                    'icon' => 'fas fa-heart-pulse',
                    'tone' => 'emerald',
                ],
                [
                    'label' => 'Hazard Open',
                    'value' => '24',
                    'meta' => '5 kategori risiko tinggi',
                    'icon' => 'fas fa-triangle-exclamation',
                    'tone' => 'lime',
                ],
                [
                    'label' => 'P2H Unit',
                    'value' => '63',
                    'meta' => '8 defect ditemukan hari ini',
                    'icon' => 'fas fa-truck-pickup',
                    'tone' => 'green',
                ],
                [
                    'label' => 'Action Overdue',
                    'value' => '9',
                    'meta' => 'Butuh eskalasi hari ini',
                    'icon' => 'fas fa-list-check',
                    'tone' => 'red',
                ],
            ],
            'quickFacts' => [
                ['label' => 'Open Permit', 'value' => '14', 'tone' => 'green'],
                ['label' => 'Critical Risk', 'value' => '4', 'tone' => 'lime'],
                ['label' => 'Inspections Today', 'value' => '31', 'tone' => 'emerald'],
                ['label' => 'Compliance Avg', 'value' => '84%', 'tone' => 'soft'],
            ],
            'sitePerformance' => [
                'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                'hazards' => [5, 8, 6, 11, 9, 4, 7],
                'p2h' => [34, 40, 37, 45, 51, 28, 31],
                'fitToWork' => [82, 90, 86, 88, 94, 71, 74],
            ],
            'riskDistribution' => [
                'labels' => ['Low', 'Medium', 'High', 'Critical'],
                'values' => [38, 26, 11, 4],
            ],
            'complianceSnapshot' => [
                'labels' => ['Fit To Work', 'P2H', 'Inspection', 'Toolbox', 'Action Close'],
                'values' => [92, 84, 88, 96, 73],
            ],
            'activityVolume' => [
                'labels' => ['05', '06', '07', '08', '09', '10', '11', '12'],
                'values' => [3, 6, 5, 8, 7, 4, 6, 5],
            ],
            'areaFocusChart' => [
                'labels' => ['Fuel Bay', 'Hauling Road', 'Workshop', 'Crusher'],
                'values' => [93, 88, 72, 67],
            ],
            'actionAging' => [
                'labels' => ['0-2 d', '3-7 d', '8-14 d', '15+ d'],
                'values' => [15, 9, 5, 4],
            ],
            'moduleHealth' => [
                'labels' => ['Fit To Work', 'P2H', 'Hazard', 'Inspection'],
                'values' => [92, 78, 69, 88],
            ],
        ]);
    }
}
