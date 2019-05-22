var btnArray;

function shop() {
    btnArray = {
        "animate": {
            "name": "アニメイト",
            "url": "https://www.animate-onlineshop.jp/products/list.php?mode=search&smt=",
            "encode": "UTF-8"
        },
        "gamers": {
            "name": "ゲーマーズ",
            "url": "https://www.gamers.co.jp/products/list.php?mode=search&smt=",
            "encode": "UTF-8"
        },
        "Sofmap": {
            "name": "Sofmap",
            "url": "https://www.sofmap.com/search_result.aspx?mode=SEARCH&styp=p_bar&product_type=ALL&gid=&keyword=",
            "encode": "SJIS"
        },
        "lashinbang": {
            "name": "らしんばん",
            "url": "https://shop.lashinbang.com/products/list?keyword=",
            "encode": "UTF-8",
        },
        "movic": {
            "name": "movic",
            "url": "https://www.movic.jp/shop/goods/search.aspx?search=x&keyword=",
            "encode": "SJIS",
        },
        "suruga-ya": {
            "name": "駿河屋",
            "url": "https://www.suruga-ya.jp/search?category=&search_word=",
            "encode": "UTF-8",
        },
        "mericari": {
            "name": "メルカリ",
            "url": "https://www.mercari.com/jp/search/?keyword=",
            "encode": "UTF-8",
        },
        "amazon": {
            "name": "Amazon",
            "url": "https://www.amazon.co.jp/s?k=",
            "encode": "UTF-8",
        },
        "Yahoo": {
            "name": "Yahoo",
            "url": "https://search.shopping.yahoo.co.jp/search?first=1&tab_ex=commerce&fr=shp-prop&oq=&aq=&mcr=1e528bbdc44bb98d788122c4a07c1159&ts=1472464780&cid=&di=&uIv=on&used=0&pf=&pt=&seller=0&mm_Check=&sc_i=shp_pc_top_searchBox&p=",
            "encode": "UTF-8",
        },
        "rakuten": {
            "name": "楽天",
            "url": "https://search.rakuten.co.jp/search/mall/",
            "encode": "UTF-8",
        },
        "kakaku.com": {
            "name": "価格.com",
            "url": "https://kakaku.com/search_results/",
            "encode": "SJIS",
        },
        "7net": {
            "name": "セブンイレブン",
            "url": "https://7net.omni7.jp/search/?keyword=",
            "encode": "UTF-8",
        }
    };
    display();
}

function card() {
    btnArray = {
        "ka-nabell": {
            "name": "カーナベル",
            "url": "https://www.ka-nabell.com/?act=sell_search&key_word=",
            "encode": "UTF-8",
        }
    }
    display();
}

function book() {
    btnArray = {
        "ebook": {
            "name": "ebook",
            "url": "https://ebookjapan.yahoo.co.jp/search?keyword=",
            "encode": "UTF-8"
        }
    }
    display();
}

$(function () {
    $('.nav-link').on('click', function () {
        var id = $(this).attr("id");
        if (id == "card") {
            card();
        } else if (id == "book") {
            book();
        } else if (id == "main") {
            shop();
        }
    });
});

function display() {
    var html = `<div class="row">`;
    for (key in btnArray) {
        var btn = btnArray[key];
        html += `<div class="col-6 col-sm-4 col-md-3"  id=${key}>
                    <ul class="nav nav-pills nav-pills-icons justify-content-center hoge" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" role="tab" data-toggle="tab">
                                <i class="material-icons">pageview</i> ${btn.name}
                            </a>
                        </li>
                    </ul>
                </div>`
    }
    html += `</div>`
    $('#btnParent').html(html);
    $('.col-6 col-sm-4 col-md-3').on('click', function () {
        var id = $(this).attr("id");
        var btn = btnArray[id];
        var word = $("#word").val();
        if (word) {
            if (btn.encode === 'SJIS') {
                word = EscapeSJIS(word);
            }
            var url = btn.url + word;
            window.open(url, '_blank');
        } else {
            splash("未入力");
        }
    });
}

$(function () {
    shop();
})
