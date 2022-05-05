@component('mail::message')
  # Вы создали заказ № {{ $order->id }}

  Статус заказа: {{ \App\Models\Order::MAP_STATUS_TRANSLATE[$order->status] }}
  <br>
  Тип доставки: {{ \App\Models\Order::MAP_DELIVERY_TRANSLATE[$order->type_delivery] }}
  <br>
  @if ($order->type_delivery === App\Models\Order::DELIVERY_IN_SHOP)
    Место выдачи: {{ $order->shop->street }}
  @endif

  @component('mail::table')
    | Наименование       | Кол-во         | Стоимость  |
    | :------------- |:-------------:| --------:|
    @foreach($items as $item)
      | [{{ $item->product->name }}]({{ url('/product/' . $item->product->id) }}) | {{ $item->count }} | {{ number_format($item->cost, 0, ',', ' ') }} ₸ |
    @endforeach
  @endcomponent
  <div align="right">
    Итого к оплате: <strong>{{ number_format($order->cost, 0, ',', ' ') }} ₸</strong>
  </div>

  @component('mail::button', ['url' => url('profile/order/' . $order->id)])
    Открыть заказ
  @endcomponent

  Спасибо,
  {{ config('app.name') }}
@endcomponent