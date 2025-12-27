<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedback;
use App\Models\DoctorUser;

class DoctorRatingSeeder extends Seeder
{
    public function run()
    {
        $doctorIds = Feedback::select('doctorId')->distinct()->pluck('doctorId');

        foreach ($doctorIds as $doctorId) {
            $stats = Feedback::where('doctorId', $doctorId)
                ->whereNull('deleted_at')
                ->selectRaw('AVG(rating) as avg_rating, COUNT(*) as total')
                ->first();

            DoctorUser::where('id', $doctorId)->update([
                'average_rating' => round($stats->avg_rating, 2),
                'total_feedbacks' => $stats->total,
                'last_calculated_at' => now(),
            ]);
        }
    }
}
