<?php

namespace Database\Factories;

use FakeParagraph;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyNames = [
            'Tech Solutions',
            'Green Energy',
            'Blue Ocean',
            'Smart Innovations',
            'Future Vision',
            'Global Ventures',
            'Creative Minds',
            'Digital World',
//            'Bright Ideas',
//            'NextGen Tech',
//            'Eco Friendly',
//            'Urban Designs',
//            'Quantum Leap',
//            'Dynamic Systems',
//            'Visionary Labs',
//            'Infinite Loop',
//            'Synergy Group',
//            'Pioneer Works',
//            'Epic Creations',
//            'Bold Strategies',
//            'Alpha Tech',
//            'Beta Innovations',
//            'Gamma Solutions',
//            'Delta Dynamics',
//            'Epsilon Ventures',
//            'Zeta Systems',
//            'Eta Designs',
//            'Theta Labs',
//            'Iota Group',
//            'Kappa Creations',
//            'Lambda Strategies',
//            'Mu Innovations',
//            'Nu Solutions',
//            'Xi Dynamics',
//            'Omicron Ventures',
//            'Pi Systems',
//            'Rho Designs',
//            'Sigma Labs',
//            'Tau Group',
//            'Upsilon Creations',
//            'Phi Strategies',
//            'Chi Innovations',
//            'Psi Solutions',
//            'Omega Dynamics',
//            'Apex Ventures',
//            'Summit Systems',
//            'Peak Designs',
//            'Zenith Labs',
//            'Horizon Group',
//            'Vertex Creations',
//            'Pinnacle Strategies',
//            'Crest Innovations',
//            'Acme Solutions',
//            'Prime Dynamics',
//            'Elite Ventures',
//            'Premier Systems',
//            'Top Designs',
//            'Supreme Labs',
//            'Ultimate Group',
//            'Paramount Creations',
//            'Forefront Strategies',
//            'Vanguard Innovations',
//            'Pioneer Solutions',
//            'Trailblazer Dynamics',
//            'Pathfinder Ventures',
//            'Navigator Systems',
//            'Explorer Designs',
//            'Discover Labs',
//            'Quest Group',
//            'Journey Creations',
//            'Odyssey Strategies',
//            'Expedition Innovations',
//            'Adventure Solutions',
//            'Voyage Dynamics',
//            'Mission Ventures',
//            'Endeavor Systems',
//            'Pursuit Designs',
//            'Chase Labs',
//            'Hunt Group',
//            'Search Creations',
//            'Seek Strategies',
//            'Find Innovations',
//            'Locate Solutions',
//            'Identify Dynamics',
//            'Detect Ventures',
//            'Spot Systems',
//            'Track Designs',
//            'Trace Labs',
//            'Follow Group',
//            'Pursue Creations',
//            'Capture Strategies',
//            'Seize Innovations',
//            'Grab Solutions',
//            'Snatch Dynamics',
//            'Catch Ventures',
//            'Hold Systems',
//            'Grip Designs',
//            'Clutch Labs',
//            'Grasp Group',
        ];

        $nameManufacturer = $this->faker->randomElement($companyNames);

        return [
            'title:ru' => $nameManufacturer,
            'title:uk' => $nameManufacturer,

            'description:ru' => FakeParagraph::countParagraph(4, 12),
            'description:uk' => FakeParagraph::countParagraph(4, 12),

            'all_title:ru' => fake()->word(),
            'all_title:uk' => fake()->word(),

            'specialization:ru' => fake()->word(),
            'specialization:uk' => fake()->word(),

            'flat:ru' => fake()->sentence,
            'flat:uk' => fake()->sentence,

            'year' => fake()->year,

        ];
    }
}
