<?php


namespace App\DesignPatterns\Structural\Adapter;


/***
 * EBookAdapter 是电子书适配器类
 *
 * 该适配器实现了 PaperBookInterface 接口,
 * 但是你不必修改客户端使用纸质书的代码
 * Class EBookAdapter
 * @package App\DesignPatterns\Structural\Adapter
 */
class EBookAdapter implements PaperBookInterface
{
    /***
     * 电子书接口
     * @var
     */
    protected $eBook;

    /***
     * 注意该构造函数注入了电子书接口EBookInterface
     * EBookAdapter constructor.
     * @param EBookInterface $ebook
     */
    public function __construct(EBookInterface $ebook)
    {
        $this->eBook = $ebook;
    }

    /***
     * 电子书将纸质书接口方法转换为电子书对应方法
     * @return mixed
     */
    public function open()
    {
        // TODO: Implement open() method.
        return $this->eBook->pressStart();
    }

    /***
     * 纸质书翻页转化为电子书翻页
     * @return mixed
     */
    public function turnPage()
    {
        // TODO: Implement turnPage() method.
        return $this->eBook->pressNext();
    }
}