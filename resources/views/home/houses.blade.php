
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
{{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
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
            cursor: pointer;
        }

        .MultiCarousel .MultiCarousel-inner .item .link > div {
            text-align: center;
            margin: 10px;
            background: #f1f1f1;
            color: #666;
            height: 250px;
            position: relative;
        }
        .MultiCarousel .MultiCarousel-inner .item .link > div:hover .lead {
            bottom: 28px;

        }
        .MultiCarousel .MultiCarousel-inner  .item .link .lead {
            position: absolute;
            z-index: 2;
            bottom: -200px;
            left: 20px;
            color: #f1f1f1;
            font-size: 20px;
            font-weight: 800;
            transition: 0.8s;
        }
         .MultiCarousel .MultiCarousel-inner .item .link .one {
             width: 100%;
             position: absolute;
             height: 100%;
             top: 0px;
             left: 0px;
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
            background: #3d80cc;
        }
        .MultiCarousel .MultiCarousel-inner .item .link > div:hover .bg {
            opacity: 1;
        }
        .MultiCarousel .MultiCarousel-inner .item .link .bg{
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 1;
            top: 0px;
            left: 0px;
            background: #0000006b;
            opacity: 0;
        }
        .MultiCarousel .MultiCarousel-inner .item .link > div:hover  p.total {
            bottom: 10px;
            opacity: 1;

        }
        .MultiCarousel .MultiCarousel-inner .item .link p.total {
            position: absolute;
            z-index: 2;
            bottom: -100px;
            left: 20px;
            color: white;
            opacity: 0;
            transition: 1s;
        }
    </style>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>


<div class="container-fluid">
    <div class="row justify-content-center">
        <h3>No matter what kind of accommodation you are looking for, we have ...</h3>
    </div>
    <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
            <div class="MultiCarousel-inner">
                @foreach($categories as $key => $category)
                    <div class="item element">
                        <a href="{{route('filter', $category->id)}}" class="link">
                            <div class="pad15">
                                <div class="bg"></div>
                                <img class="img-fluid one" src="{{asset("storage/$category->image")}}" >
                                <p class="lead">{{$category->name}}</p>
                                <p class="total">Total: {{count($category->houses)}} house</p>
                            </div>
                        </a>
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
