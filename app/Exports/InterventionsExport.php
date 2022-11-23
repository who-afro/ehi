<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InterventionsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{
    private $interventions;

    use Exportable;

    public function __construct(Collection $interventions)
    {
        $this->interventions = $interventions;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->interventions;
    }

    public function headings(): array
    {
        return [
            'Program Area',
            'Condition',
            'Age Cohort',
            'Public Health Function',
            'Level of Care',
            'Intervention',
            'Published Evidence'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 45,
            'B' => 45,
            'C' => 35,
            'D' => 35,
            'E' => 35,
            'F' => 75,
            'G' => 35,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // header row
            '1' => ['font' => ['bold' => true]],
            // Styling an entire column.
            'A' => ['font' => ['size' => 16],
            ],
            'B' => ['font' => ['size' => 16],
            ],
            'C' => ['font' => ['size' => 16],
            ],
            'D' => ['font' => ['size' => 16],
            ],
            'E' => ['font' => ['size' => 16],
            ],
            'F' => ['font' => ['size' => 16],
                'alignment' => ['wrapText' => true]
            ],
            'G' => ['font' => ['size' => 16],
            ],
        ];
    }
}
