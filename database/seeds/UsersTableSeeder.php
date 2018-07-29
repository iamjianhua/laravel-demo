<?php

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Faker\Generator $faker */
        $faker = app(Generator::class);
        $avatars = [
            'http://pcgjs4acr.bkt.clouddn.com/u=2350582780,1328325320&fm=27&gp=0.jpg',
            'http://pcgjs4acr.bkt.clouddn.com/u=2402022040,1440331303&fm=27&gp=0.jpg',
            'http://pcgjs4acr.bkt.clouddn.com/u=2690291640,1620121856&fm=27&gp=0.jpg',
            'http://pcgjs4acr.bkt.clouddn.com/u=2835428853,3036584250&fm=27&gp=0.jpg',
            'http://pcgjs4acr.bkt.clouddn.com/u=808043110,2067184383&fm=27&gp=0.jpg',
            'http://pcgjs4acr.bkt.clouddn.com/u=28534653,4177891376&fm=27&gp=0.jpg',
        ];
        /** @var \Illuminate\Database\Eloquent\FactoryBuilder $factory */
        $factory = factory(User::class)
            ->times(15)
            ->make()
            ->each(function ($user, $index) use ($faker, $avatars) {
                // 从头像数组中随机取出一个值，并赋值给用户头像属性上。
                $user->avatar = $faker->randomElement($avatars);
            });
        // 让隐藏字段可见，并将数据集合转换为数组。
        $array = $factory->makeVisible(['password', 'remember_token'])->toArray();
        // 将数据插入到用户数据表中。
        User::insert($array);
        $user = User::find(1);
        $user->name = 'Laravel Framework';
        $user->email = 'laravel@gmail.com';
        $user->avatar = 'http://pcgjs4acr.bkt.clouddn.com/u=2350582780,1328325320&fm=27&gp=0.jpg';
        $user->save();
    }
}
