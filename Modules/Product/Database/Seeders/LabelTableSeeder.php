<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Entities\Label;

class LabelTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $module = 'product';
        Label::where('module', $module)->delete();

        $labels = [
            ["key" => "product_category", "vi" => ["value" => "Danh mục sản phẩm"], "en" => ["value" => "Product Category"]],
            ["key" => "featured", "vi" => ["value" => "Featured"], "en" => ["value" => "Featured"]],
        ];

        foreach ($labels as $label) {
            $label['module'] = $module;
            Label::create($label);
        }

        $this->enableForeignKeys();
    }
}
