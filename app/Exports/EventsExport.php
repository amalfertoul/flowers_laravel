<?php

namespace App\Exports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EventsExport implements FromCollection, WithHeadings, WithStyles
{
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function collection()
    {
        return Event::with('user:id,username,email')
                    ->get()
                    ->map(function ($event) {
                        return [
                            'ID' => $event->id,
                            'User' => $event->user->username ?? 'N/A',  // User name
                            'Event Date' => $event->eventDate,
                            'Phone Number' => $event->phoneNumber,
                            'Event Title' => $event->eventTitle,
                            'Request' => $event->request,
                        ];
                    });
    }

    public function headings(): array
    {
        return [
            'ID', 
            'User',  // Updated to match what you're returning in the collection method
            'Event Date', 
            'Phone Number', 
            'Event Title', 
            'Request'
        ];
    }
}
