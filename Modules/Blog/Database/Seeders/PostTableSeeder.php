<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Entities\Post;

class PostTableSeeder extends Seeder
{
    use \DisableForeignKeys, \TruncateTable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('posts');

        factory(Post::class, 10)->create();

        $this->enableForeignKeys();
    }
}
