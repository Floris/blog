<?php

use Illuminate\Database\Seeder;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'First Post',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lorem ex, pellentesque vitae lacinia at, semper vitae ex. Fusce condimentum laoreet metus, semper condimentum quam pharetra in. Phasellus rutrum purus luctus neque convallis viverra. Mauris tempus ipsum ac mollis dictum. Mauris vel cursus diam. Donec ac eleifend sapien. In commodo est libero, et accumsan arcu dignissim ut. Duis molestie tempor sem id dictum. Cras aliquet enim in mauris accumsan sodales. Donec dapibus fermentum dictum. Pellentesque dignissim massa ac urna semper, sed fermentum metus dapibus. Morbi leo odio, cursus at tortor at, efficitur faucibus nisl.

Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum condimentum justo at est aliquam, mollis aliquam neque bibendum. Pellentesque pulvinar metus eget enim laoreet elementum. Integer nulla urna, imperdiet vestibulum laoreet in, efficitur id dolor. Duis justo eros, pharetra in luctus et, rutrum ac arcu. Nam aliquet eu ante sit amet dignissim. Etiam sit amet hendrerit diam. Vestibulum porttitor feugiat eros.

Quisque et dictum metus. Suspendisse cursus iaculis felis, vitae sagittis nisl tristique id. Suspendisse in tortor nec tortor vehicula fermentum euismod sit amet lectus. Nullam rhoncus ornare quam et pellentesque. Phasellus facilisis ornare diam, in fermentum quam vehicula quis. Quisque non interdum urna. Fusce vitae felis est. Nullam nisi massa, laoreet ac elit quis, tincidunt porttitor leo. In facilisis nulla in ipsum eleifend, fermentum pulvinar eros blandit.

Vivamus consectetur eros quis orci suscipit luctus. Aliquam tortor nibh, gravida dignissim ex at, pharetra venenatis erat. Integer a lobortis massa. Proin dignissim purus urna, id lacinia ligula fermentum vel. Duis interdum leo purus, ac cursus ante iaculis vel. Aenean ultrices at neque fringilla lobortis. Cras ac interdum velit, eget tincidunt odio. In varius felis libero, sed commodo turpis blandit vitae. Maecenas eget semper orci. Maecenas mattis a enim nec porta.

Sed ultrices, est eu blandit efficitur, est odio eleifend sem, sit amet bibendum dui urna nec turpis. Phasellus dapibus consectetur dui quis ultricies. Integer gravida auctor faucibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam luctus nibh id diam elementum, in faucibus ligula bibendum. Ut molestie massa massa, interdum elementum leo dictum sit amet. Quisque nisl enim, varius et bibendum sit amet, convallis sed augue. Nullam sollicitudin quis odio nec feugiat. Nam at leo ac sapien consequat condimentum vitae et lectus. Ut suscipit dignissim dui, imperdiet maximus tortor varius eget.',
            'draft' => NULL,
        ]);
    }
}
