@extends('home.index')
@section('content')
        @include('home.nav')
    <style>
        html, body {
            height: 100%;
            background: url(http://thuthuatphanmem.vn/uploads/2018/05/18/hinh-nen-full-hd-1080-bai-bien-dep_022853660.jpg) fixed;
            background-size: cover;
        }
        .card.border-secondary.mb-3 {
            position: relative;
            top: 150px;
            height: 350px;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
            margin-top: 154px;
            background-color: #f8f8ffb5;
            padding-top: 0px;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .animaiton {
            transition: 0.2s;
            opacity: 0;
            visibility: hidden;
        }
        .payment{
            border-top:3px solid #2fadd0;

        }

    </style>

    <div>

        <div class="invoice-box">
            <div class="col-sm-12 mt-1">
                <h2 class="text-center mt-1 text-info">Payment</h2>
                <hr class="payment">
            </div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="https://www.rolab.co.uk/wp-content/uploads/2018/01/Paypal-Hoverboard.jpg"
                                         style="width:100%; max-width:190px;">
                                </td>
                                <td>
                                    Bill: {{$booking->id}}<br>
                                    Check in: {{$booking->date_from}}<br>
                                    Check out: {{$booking->date_to}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Address: {{Auth::user()->address}}.<br>
                                    Phone: {{Auth::user()->phone}}
                                </td>

                                <td>
                                    Full Name: {{Auth::user()->name}}<br>
                                    Email: {{Auth::user()->email}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                        Item
                    </td>

                    <td>
                        Price
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        Per Night
                    </td>

                    <td>
                        ${{$booking->house->price}}
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        Amount
                    </td>

                    <td>
                        {{$date}}
                    </td>
                </tr>

                <tr class="item last">
                    <td>
                        Adults and Child
                    </td>

                    <td>
                        {{$booking->adults}}, {{$booking->child}}
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                        Payment Method
                    </td>

                    <td>
                    </td>
                </tr>
                <tr class="total">
                    <td></td>

                    <td>
                        Total: ${{$booking->total_money}}
                    </td>
                </tr>
                <tr class="details">
                    <td>
                        Check
                    </td>

                    <td>
                        <form action="{{route('booking.payment',$booking->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="checkbox-inline"><input class="mr-2" type="radio" value="Paypal" name="payment" checked>Paypal</label>
                            <label class="checkbox-inline"><input class="mr-2" type="radio" value="Zalo Pay" name="payment">Zalo Pay</label>
                            <label class="checkbox-inline mr-5"><input class="mr-2" type="radio" value="Visa" name="payment">Visa</label>
                            <p style="font-size: 15px; color: red;word-wrap: break-word">
                                <strong>{{$errors->first('payment')}}</strong>
                            </p>
                            <button type="submit" class="btn btn-info">Pay To Book</button>
                        </form>

                    </td>
                </tr>
            </table>
        </div>
    </div>
        <script>
            $(document).ready(function () {
                $(window).scroll(function () {
                    $('.menu').toggleClass("animaiton", ($(window).scrollTop() > 30));
                });
            });
        </script>
@endsection
