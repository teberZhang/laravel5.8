<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/***
 * Class SendEmails
 * @package App\Console\Commands
 * 使用 Artisan 构建强大的控制台应用
 * 控制台命令: --force 存在为true 未传递默认false
 * php artisan email:send tom jack --queue=kk --force
 */
class SendEmails extends Command
{
    /**
     * 控制台命令的名称和签名.
     *
     * @var string
     */
    protected $signature = 'email:send 
        {user* : 用户id集合jack tom —— 数组} 
        {--queue=default : 任务是否需要使用队列}
        {--force : 传递布尔值}';

    /**
     * 控制台命令描述.
     *
     * @var string
     */
    protected $description = '向用户发送电子邮件';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**执行期间要用户提供输入-用户可见*/
        //$name = $this->ask('What is your name?');
        /**执行期间要用户提供输入-用户不可见*/
        //$password = $this->secret('What is the password?');
        /**让用户确认*/
        /*if ($this->confirm('Do you wish to continue? [y|N]')) {
            echo 'Yes' . " \n";
        }*/
        //给用户提供选择
        //$sex = $this->anticipate('What is your sex?', ['Man', 'Women'] , 'Man');

        /**编写输出*/
        //绿色
        $this->info('Display this on the screen');
        //红色
        $this->error('Something went wrong!');
        //不带颜色
        $this->line('Display this on the screen');

        /**表格布局*/
        $headers = ['Name', 'Email'];
        $users = [
            ['Name'=>'jack','Email'=>'324532@qq.com'],
            ['Name'=>'sami','Email'=>'54324dfd@qq.com']
        ];
        $this->table($headers, $users);

        /**进度条*/
        $users = [
            ['id'=>1],
            ['id'=>2],
        ];
        $bar = $this->output->createProgressBar(count($users));
        foreach ($users as $user) {
            sleep(1); // 模拟任务执行
            $bar->advance();
        }

        $bar->finish();
        $this->info('task finished!');

        /**通过其他命令调用命令*/


        /**所有参数的值*/
        $arguments = $this->arguments();
        $this->info('arguments = ' . json_encode($arguments));
        /**所有选项值*/
        $options = $this->options();
        $this->info('options = ' . json_encode($options));

        Log::info(date("Y-m-d H:i:s")." --- php artisan email:send");
    }
}
