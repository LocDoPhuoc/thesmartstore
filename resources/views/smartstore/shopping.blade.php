@extends('smartstore.master')
@section('main')
  <div class="container">
     
    <div class="row filter">
      <ul class="breadcrumb bread-head">
        <li>
          <a href="{!! url('/home') !!}"" title="The Smart Store">
            <span class="glyphicon glyphicon-home"></span>
            Trang chủ
          </a>
        </li>
          <span class"space"> > </span>
          <li>
            <a href="{!! url('/home/shopping') !!}" title="">
              <span class="glyphicon glyphicon-shopping-cart"></span>
              Giỏ hàng

            </a>
        </li>
      </ul>
    </div>


  </div>
  <div class="container">
    @if($num == 0)
    <div class="no-item row row-cart">
      <h2 class="title-cart">Bạn không có sản phẩm nào trong giỏ hàng</h2>
      <div class="col-md-4 col-md-offset-2">
        <a href="{!! url(Session::get('url')) !!}" type="button" class="btn btn-success pull-right mr10">Tiếp tục mua hàng</a>
      </div>
    </div>
    @else
    <div class="row row-cart ">
      <h2 class="title-cart">GIỎ HÀNG CỦA BẠN</h2>
      <div class="table-responsive">
        <form method="POST" action="">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <table class="table table-bordered">
          <thead>
            <tr class="info">
              <th>Hình ảnh</th>
              <th>Sản phẩm</th>
              <th>Số lượng</th>
              <th>Cập nhật</th>
              <th>Đơn giá</th>
              <th>Thành tiền</th>
            </tr>
          </thead>

            @foreach($content as $item)
            <tbody>
              <tr>
                <td class="image"><img title="product" alt="product" src="{!!  asset($item->options->img)!!}" height="50" width="50"></td>
                <td class="name"><a href="#" class="name-product">{!! $item->name !!}</a></td>
                <td class="quantity " >
                  <input type="text"  class="qty" size="1" value="{!! $item->qty !!}" name="quantity[40]">
                </td>
                <td >
                  {{-- Su dung ajax href phai cho bang # --}}
                  <a href="#" class="update-cart" id="{!! $item->rowId !!}"><i class="fa fa-refresh fa-lg" aria-hidden="true"></i></a>

                  <a href="{!! url('/home/delete',[$item->rowId]) !!}" class="remove-cart"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                </td>
                <td class="cart-price">{!! number_format($item->price,0,',','.') !!} đ</td>
                <td class="">{!! number_format($item->price*$item->qty,0,',','.') !!} đ</td>
              </tr>
            </tbody>
            @endforeach
          
        </table>
        </form>
          
        </div>
        <div class="pull-right">
              <div class="span4 pull-right" style="padding-right: 15px;">
                <table class="table">
                  <tr >
                    <td class="total"><span class="extra bold totalamout">Total :</span></td>
                    <td class="total"><span class="bold totalamout">{!! Cart::subtotal(-2,',','.')!!} đồng</span></td>
                  </tr>
                </table>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom: 15px;">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <a href="{!! url(Session::get('url')) !!}" type="button" class="btn btn-success pull-right mr10">Tiếp tục mua hàng</a>
                  </div>

                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <a  href="{!! route("shopping.getCheckOut") !!}" type="button" class="btn btn-warning pull-right check-out">Thanh toán</a>
                  </div>
                  
                </div>
              </div>
        </div>
      </div>
  </div>
  @endif
</div>
@stop