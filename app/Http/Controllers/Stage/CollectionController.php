<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

/***
 * 进阶系列 —— 集合
 * Class CollectionController
 * @package App\Http\Controllers\Stage
 */
class CollectionController extends Controller
{
    public function index()
    {
        // 为每一个元素运行 strtoupper 函数，然后移除所有空元素
//        $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
//            return strtoupper($name);
//        })->reject(function ($name) {
//            return empty($name);
//        });
//        dump($collection);

        // 扩展集合添加了 toUpper 方法到 Collection 类
        Collection::macro('toUpper', function () {
            return $this->map(function ($value) {
                return Str::upper($value);
            });
        });

        $collection = collect(['first', 'second']);
        $upper = $collection->toUpper();
        dump($upper->all());

        // 高阶消息传递
        // 支持高阶消息传递的方法包括：
        //average、avg、contains、each、every、filter、first、
        //map、partition、reject、sortBy、sortByDesc、sum 和 unique。
//        $users = \App\Models\User::where('country_id', '>', 5)->get();
//        $users->each(function ($item,$key){
//            $item->isvip = 10;
//        });
//        dump($users);


    }

    public function med()
    {
        /***
         * 方法列表
         */
        // all 方法简单返回集合表示的底层数组：
        //var_dump(collect([1, 2, 3])->all());

        // avg 方法返回所有集合项的平均值
        /*$average = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->avg('foo');
        var_dump($average);
        $average = collect([1, 1, 2, 4])->avg();
        var_dump($average);*/

        // chunk 方法将一个集合分割成多个小尺寸的小集合：[[1, 2, 3, 4], [5, 6, 7]]
//        $collection = collect([1, 2, 3, 4, 5, 6, 7]);
//        $chunks = $collection->chunk(4);
//        dd($chunks->toArray());

        // collapse 方法将一个多维数组集合收缩成一个一维数组[1, 2, 3, 4, 5, 6, 7, 8, 9]
//        $collection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
//        $collapsed = $collection->collapse();
//        dd($collapsed->all());

        // combine 方法可以将一个集合的键和另一个数组或集合的值连接起来：['name' => 'George', 'age' => 29]
//        $collection = collect(['name', 'age']);
//        $combined = $collection->combine(['George', 29]);
//        dd($combined->all());

        /***
         * contains '1' 和 1 相等
         * 如果想更严格的可以用 containsStrict()
         */
        // concat 方法可用于追加给定数组或集合数据到集合末尾：['John Doe', 'Jane Doe', 'Johnny Doe']
//        $collection = collect(['John Doe']);
//        $concatenated = $collection->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe']);
//        dd($concatenated->all());

        // contains 方法判断集合是否包含一个给定项：
//        $collection = collect(['name' => 'Desk', 'price' => 100]);
//        echo $collection->contains('Desk');
        // 你还可以传递一个键值对到 contains 方法，这将会判断给定键值对是否存在于集合中：
//        $collection = collect([
//            ['product' => 'Desk', 'price' => 200],
//            ['product' => 'Chair', 'price' => 100],
//        ]);
//        var_dump($collection->contains('product', 'Bookcase'));
//        var_dump($collection->contains('product', 'Desk'));
        // 你还可以传递一个回调到 contains判断是否有大于5的数返回true or false
//        $collection = collect([1, 2, 3, 4, 5]);
//        var_dump($collection->contains(function ($key, $value) {
//            return $value > 5;
//        }));

        // count 方法返回集合中所有项的总数：
//        $collection = collect([1, 2, 3, 4]);
//        dd($collection->count());

        //crossJoin 方法会在给定数组或集合之间交叉组合集合值，然后返回所有可能排列组合的笛卡尔积
        /*
            [
                [1, 'a'],
                [1, 'b'],
                [2, 'a'],
                [2, 'b'],
            ]
        */
//        $collection = collect([1, 2]);
//        $matrix = $collection->crossJoin(['a', 'b']);
//        dump($matrix->all());
        /*
            [
                [1, 'a', 'I'],
                [1, 'a', 'II'],
                [1, 'b', 'I'],
                [1, 'b', 'II'],
                [2, 'a', 'I'],
                [2, 'a', 'II'],
                [2, 'b', 'I'],
                [2, 'b', 'II'],
            ]
        */
//        $collection = collect([1, 2]);
//        $matrix = $collection->crossJoin(['a', 'b'], ['I', 'II']);
//        dump($matrix->all());

        // 返回存在于原来集合而不存在于给定集合的值： [1, 3, 5]
//        $collection = collect([1, 2, 3, 4, 5]);
//        $diff = $collection->diff([2, 4, 6, 8]);
//        dump($diff->all());

        // 该方法返回只存在于第一个集合中的键值对：['color' => 'orange', 'remain' => 6]
//        $collection = collect([
//            'color' => 'orange',
//            'type' => 'fruit',
//            'remain' => 6
//        ]);
//        $diff = $collection->diffAssoc([
//            'color' => 'yellow',
//            'type' => 'fruit',
//            'remain' => 3,
//            'used' => 6
//        ]);
//        dd($diff->all());

        // 该方法会返回只存在于第一个集合的键值对： ['one' => 10, 'three' => 30, 'five' => 50]
        $collection = collect([
            'one' => 10,
            'two' => 20,
            'three' => 30,
            'four' => 40,
            'five' => 50,
        ]);
        $diff = $collection->diffKeys([
            'two' => 2,
            'four' => 4,
            'six' => 6,
            'eight' => 8,
        ]);
        dump($diff->all());
    }

    public function med2()
    {

        // each 方法迭代集合
//        $collection = collect([10, 20, 30]);
//        $collection = $collection->each(function ($item, $key) {
//            if ($item > 20) {
//                return false;
//            }
//        });

        // eachSpread 方法会迭代集合项，传递每个嵌套数据项值到给定集合
//        $collection = collect([['John Doe', 35], ['Jane Doe', 33]]);
//        $collection->eachSpread(function ($name, $age) {
//        });

        // every 方法可以用于验证集合的所有元素能够通过给定的真理测试(是否全部 > 3)
//        $result = collect([1, 2, 3, 4])->every(function ($value, $key) {
//            return $value > 3;
//        });
//        dump($result);

        // except 方法返回集合中除了指定键的所有集合项：['product_id' => 1]
        // 与 except 相对的是 only 方法。
//        $collection = collect(['product_id' => 1, 'price' => 100, 'discount' => false]);
//        $filtered = $collection->except(['price', 'discount']);
//        dump($filtered->all());

        // filter 方法通过给定回调过滤集合[3, 4]
        // 和 filter 相对的方法是 reject。
//        $filtered = collect([1, 2, 3, 4])->filter(function ($value, $key) {
//            return $value > 2;
//        });
//        dump($filtered->all());
        // 如果没有提供回调，那么集合中所有等价于 false 的项都会被移除：[1, 2, 3]
//        $collection = collect([1, 2, 3, null, false, '', 0, []]);
//        dd($collection->filter()->all());

        // first 方法返回通过真理测试集合的第一个元素：3
        // 和 last相对
//        $result = collect([1, 2, 3, 4])->first(function ($value, $key) {
//            return $value > 2;
//        });
//        dump($result);
        // 你还可以调用不带参数的 first 方法来获取集合的第一个元素，如果集合是空的，返回 null：1
//        $result = collect([1, 2, 3, 4])->first();
//        dump($result);

        // firstWhere 方法会返回集合中的第一个元素，包含键值对：['name' => 'Linda', 'age' => 14]
//        $collection = collect([
//            ['name' => 'Regena', 'age' => 12],
//            ['name' => 'Linda', 'age' => 14],
//            ['name' => 'Diego', 'age' => 23],
//            ['name' => 'Linda', 'age' => 84],
//        ]);
//        dump($collection->firstWhere('name', 'Linda'));
//        dump($collection->firstWhere('age', '>=', 18));

        // flatMap 方法会迭代集合并传递每个值到给定回调:['name' => 'SALLY', 'school' => 'ARKANSAS', 'age' => '28'];
//        $collection = collect([
//            ['name' => 'Sally'],
//            ['school' => 'Arkansas'],
//            ['age' => 28]
//        ]);
//        $flattened = $collection->flatMap(function ($values) {
//            return array_map('strtoupper', $values);
//        });
//        dump($flattened->all());

        // flatten 方法将多维度的集合变成一维的：
        //['taylor', 'php', 'javascript'];
        /*
        [
            ['name' => 'iPhone 6S', 'brand' => 'Apple'],
            ['name' => 'Galaxy S7', 'brand' => 'Samsung'],
        ]
        */
//        $collection = collect(['name' => 'taylor', 'languages' => ['php', 'javascript']]);
//        $flattened = $collection->flatten();
//        dump($flattened->all());

//        $collection = collect([
//            'Apple' => [
//                ['name' => 'iPhone 6S', 'brand' => 'Apple'],
//            ],
//            'Samsung' => [
//                ['name' => 'Galaxy S7', 'brand' => 'Samsung']
//            ],
//        ]);
//        $products = $collection->flatten(1);
//        dd($products->values()->all());

        // flip 方法将集合的键值做交换：['taylor' => 'name', 'laravel' => 'framework']
//        $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
//        $flipped = $collection->flip();
//        dump($flipped->all());

        // forget 方法通过键从集合中移除数据项：[framework' => 'laravel']
//        $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
//        $collection->forget('name');
//        $collection->all();

        // forPage 方法返回新的包含给定页数数据项的集合[4, 5, 6]
//        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
//        $chunk = $collection->forPage(2, 3);
//        $chunk->all();

        // get
//        $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
//        $value = $collection->get('foo', 'default-value');
//
//        $collection->get('email', function () {
//            return 'default-value';
//        });

        // groupBy 方法通过给定键分组集合数据项：
        /*
        [
            'account-x10' => [
                ['account_id' => 'account-x10', 'product' => 'Chair'],
                ['account_id' => 'account-x10', 'product' => 'Bookcase'],
            ],
            'account-x11' => [
                ['account_id' => 'account-x11', 'product' => 'Desk'],
            ],
        ]
        */
//        $collection = collect([
//            ['account_id' => 'account-x10', 'product' => 'Chair'],
//            ['account_id' => 'account-x10', 'product' => 'Bookcase'],
//            ['account_id' => 'account-x11', 'product' => 'Desk'],
//        ]);
//        $grouped = $collection->groupBy('account_id');
//        $grouped->toArray();

        /*
        [
            'x10' => [
                ['account_id' => 'account-x10', 'product' => 'Chair'],
                ['account_id' => 'account-x10', 'product' => 'Bookcase'],
            ],
            'x11' => [
                ['account_id' => 'account-x11', 'product' => 'Desk'],
            ],
        ]
        */
//        $grouped = $collection->groupBy(function ($item, $key) {
//            return substr($item['account_id'], -3);
//        });
//        $grouped->toArray();

        // 多个分组条件可以以一个数组的方式传递，每个数组元素都会应用到多维数组中的对应层级：
        /*
        [
            1 => [
                'Role_1' => [
                    10 => ['user' => 1, 'skill' => 1, 'roles' => ['Role_1', 'Role_3']],
                    20 => ['user' => 2, 'skill' => 1, 'roles' => ['Role_1', 'Role_2']],
                ],
                'Role_2' => [
                    20 => ['user' => 2, 'skill' => 1, 'roles' => ['Role_1', 'Role_2']],
                ],
                'Role_3' => [
                    10 => ['user' => 1, 'skill' => 1, 'roles' => ['Role_1', 'Role_3']],
                ],
            ],
            2 => [
                'Role_1' => [
                    30 => ['user' => 3, 'skill' => 2, 'roles' => ['Role_1']],
                ],
                'Role_2' => [
                    40 => ['user' => 4, 'skill' => 2, 'roles' => ['Role_2']],
                ],
            ],
        ];
        */
//        $data = new Collection([
//            10 => ['user' => 1, 'skill' => 1, 'roles' => ['Role_1', 'Role_3']],
//            20 => ['user' => 2, 'skill' => 1, 'roles' => ['Role_1', 'Role_2']],
//            30 => ['user' => 3, 'skill' => 2, 'roles' => ['Role_1']],
//            40 => ['user' => 4, 'skill' => 2, 'roles' => ['Role_2']],
//        ]);
//        $result = $data->groupBy([
//            'skill',
//            function ($item) {
//                return $item['roles'];
//            },
//        ], $preserveKeys = true);

    }

    public function med3()
    {
        // has 方法判断给定键是否在集合中存在:false
//        $collection = collect(['account_id' => 1, 'product' => 'Desk']);
//        $collection->has('email');

        // implode 方法连接集合中的数据项 Desk, Chair
//        $collection = collect([
//            ['account_id' => 1, 'product' => 'Desk'],
//            ['account_id' => 2, 'product' => 'Chair'],
//        ]);
//        $collection->implode('product', ', ');

        // '1-2-3-4-5'
//        collect([1, 2, 3, 4, 5])->implode('-');

        // intersect 方法返回两个集合的交集，结果集合将保留原来集合的键：[0 => 'Desk', 2 => 'Chair']
//        $collection = collect(['Desk', 'Sofa', 'Chair']);
//        $intersect = $collection->intersect(['Desk', 'Chair', 'Bookcase']);
//        $intersect->all();

        // intersectByKeys 方法会从原生集合中移除任意没有在给定数组或集合中出现的键：['type' => 'screen', 'year' => 2009]
//        $collection = collect([
//            'serial' => 'UX301', 'type' => 'screen', 'year' => 2009
//        ]);
//        $intersect = $collection->intersectByKeys([
//            'reference' => 'UX404', 'type' => 'tab', 'year' => 2011
//        ]);
//        $intersect->all();

        // 如果集合为空的话 isEmpty 方法返回 true；否则返回 false：true
//        collect([])->isEmpty();

        // keyBy:
        /*
        [
            'prod-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
            'prod-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]
        */
//        $collection = collect([
//            ['product_id' => 'prod-100', 'name' => 'desk'],
//            ['product_id' => 'prod-200', 'name' => 'chair'],
//        ]);
//        $keyed = $collection->keyBy('product_id');
//        $keyed->all();

        // 你还可以传递自己的回调到该方法，该回调将会返回经过处理的键的值作为新的集合键：
        /*
            [
                'PROD-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
                'PROD-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
            ]
        */
//        $keyed = $collection->keyBy(function ($item) {
//            return strtoupper($item['product_id']);
//        });
//        $keyed->all();

        // keys 方法返回所有集合的键：['prod-100', 'prod-200']
//        $collection = collect([
//            'prod-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
//            'prod-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
//        ]);
//        $keys = $collection->keys();
//        $keys->all();

        // map 方法遍历集合并传递每个值给给定回调。该回调可以修改数据项并返回，从而生成一个新的经过修改的集合：
        // [2, 4, 6, 8, 10]
//        $collection = collect([1, 2, 3, 4, 5]);
//        $multiplied = $collection->map(function ($item, $key) {
//            return $item * 2;
//        });
//        $multiplied->all();

        // mapInto() 方法会迭代集合，通过传递值到构造器来为给定类创建新的实例：
        // [Currency('USD'), Currency('EUR'), Currency('GBP')]
//        class Currency
//        {
//            function __construct(string $code)
//            {
//                $this->code = $code;
//            }
//        }
//        $collection = collect(['USD', 'EUR', 'GBP']);
//        $currencies = $collection->mapInto(Currency::class);
//        $currencies->all();

        // mapSpread():[1, 5, 9, 13, 17]
//        $collection = collect([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]);
//        $chunks = $collection->chunk(2);
//        $sequence = $chunks->mapSpread(function ($odd, $even) {
//            return $odd + $even;
//        });
//        $sequence->all();

        // mapToGroups 方法会通过给定回调对集合项进行分组
//        $collection = collect([
//            [
//                'name' => 'John Doe',
//                'department' => 'Sales',
//            ],
//            [
//                'name' => 'Jane Doe',
//                'department' => 'Sales',
//            ],
//            [
//                'name' => 'Johnny Doe',
//                'department' => 'Marketing',
//            ]
//        ]);
//        $grouped = $collection->mapToGroups(function ($item, $key) {
//            return [$item['department'] => $item['name']];
//        });
//        $grouped->toArray();

        /*
            [
                'Sales' => ['John Doe', 'Jane Doe'],
                'Marketing' => ['Johhny Doe'],
            ]
        */

//        $grouped->get('Sales')->all();
        // ['John Doe', 'Jane Doe']

        //



    }
}
