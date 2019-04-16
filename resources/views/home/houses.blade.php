{{--    <div data-ats="44" class="js-ds-layout-events-bh_promotions">--}}
{{--        <h2 class="d-bh-promotion--block-title">Dù bạn đang tìm chỗ nghỉ nào chăng nữa, chúng tôi đều có...</h2>--}}
{{--        <div role="region" aria-label="Property types" class="bui-carousel bui-carousel--small bui-u-bleed@small" data-bui-component="Carousel">--}}
{{--            <ul class="bui-carousel__inner" data-bui-ref="carousel-container">--}}
{{--                @if(count($categories) == 0)--}}
{{--                    <tr>--}}
{{--                        <td colspan="4">No data</td>--}}
{{--                    </tr>--}}
{{--                @else--}}
{{--                    @foreach($categories as $key => $category)--}}
{{--                        <li class="bui-carousel__item" data-bui-ref="carousel-item">--}}
{{--                            <div class="bui-card bui-card--media bui-card--transparent">--}}
{{--                                <div class="bui-card__image-container d-bh-promotion--image-container" onclick="window.open('/apartments/index.vi.html?aid=376447;label=bookings-naam-AZsrzONxiE5g4NMW6yRqbwS267778332220%3Apl%3Ata%3Ap1%3Ap22%2C308%2C000%3Aac%3Aap1t1%3Aneg%3Afi%3Atiaud-294889293253%3Akwd-65526620%3Alp1028580%3Ali%3Adec%3Adm;sid=5ce92d47024954a0b1b8a5fa3161662d;from_booking_home_promotion=1&amp;')">--}}
{{--                                    <img class="bui-card__image" src="{{asset("storage/$category->image")}}">--}}
{{--                                </div>--}}
{{--                                <div class="bui-card__content">--}}
{{--                                    <a href="#" target="_blank" class="bui-card__title d-bh-promotion--theme-title">{{$category->name}}</a>--}}
{{--                                    <p class="bui-card__subtitle">742,046 căn hộ</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </ul>--}}
{{--            <div class="bui-carousel__nav">--}}
{{--                <button type="button" class="bui-carousel__button bui-is-visible bui-is-clickable" data-bui-ref="carousel-prev" aria-label="Previous content">--}}
{{--                    <svg class="bk-icon -iconset-navarrow_left bui-carousel__prev" height="32" role="presentation" width="32" viewBox="0 0 128 128"><path d="M73.7 96a4 4 0 0 1-2.9-1.2L40 64l30.8-30.8a4 4 0 0 1 5.7 5.6L51.3 64l25.2 25.2a4 4 0 0 1-2.8 6.8z"></path></svg>--}}
{{--                </button>--}}
{{--                <button type="button" class="bui-carousel__button bui-is-visible bui-is-clickable" data-bui-ref="carousel-next" aria-label="Next content">--}}
{{--                    <svg class="bk-icon -iconset-navarrow_right bui-carousel__next" height="32" role="presentation" width="32" viewBox="0 0 128 128"><path d="M54.3 96a4 4 0 0 1-2.8-6.8L76.7 64 51.5 38.8a4 4 0 0 1 5.7-5.6L88 64 57.2 94.8a4 4 0 0 1-2.9 1.2z"></path></svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .MultiCarousel {
            float: left;
            overflow: hidden;
            padding: 15px;
            width: 100%;
            position: relative;
        }

        .MultiCarousel .MultiCarousel-inner {
            transition: 1s ease all;
            float: left;
        }

        .MultiCarousel .MultiCarousel-inner .item.element {
            float: left;
            width:250px ;
        }

        .MultiCarousel .MultiCarousel-inner .item > div {
            text-align: center;
            /*padding: 10px;*/
            margin: 10px;
            background: #f1f1f1;
            color: #666;
            height: 250px;
        }
        .MultiCarousel .MultiCarousel-inner .item .lead {
            font-size: 14px;
        }
         .MultiCarousel .MultiCarousel-inner .item .one {
             width: 100%;
             height: 175px;
        }



        .MultiCarousel .leftLst, .MultiCarousel .rightLst {
            position: absolute;
            border-radius: 50%;
            top: calc(50% - 20px);
        }

        .MultiCarousel .leftLst {
            left: 0;
        }

        .MultiCarousel .rightLst {
            right: 0;
        }

        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over {
            pointer-events: none;
            background: #ccc;
        }
    </style>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
            <div class="MultiCarousel-inner">
                @foreach($categories as $key => $category)
                    <div class="item element">
                        <div class="pad15">
                            <img class="img-fluid one" src="{{asset("storage/$category->image")}}" >
                            <p class="lead">{{$category->name}}</p>
                            <p>50% off</p>
                        </div>

                    </div>
                @endforeach
            </div>
        <button class="btn btn-primary leftLst"><</button>
        <button class="btn btn-primary rightLst">></button>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();


        $(window).resize(function () {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });
</script>
</body>
</html>
