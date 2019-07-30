@component('mail::message')
# 介绍

您的订单已发货!.

@component('mail::button', ['url' => $url, 'color' => 'green'])
查看订单
@endcomponent

# 面板组件
@component('mail::panel')
    这是面板内容.
@endcomponent

# 表格组件
@component('mail::table')
    | 商品          | 规格           | 价格  |
    | ------------- |:-------------:| --------:|
    | 毛呢大衣       | 2XL 蓝色      | ￥120      |
    | 特步跑鞋       | 44码 白色     | ￥259      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
