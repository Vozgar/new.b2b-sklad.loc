$(document).ready(function() {

    window.change_page = 0;
    window.request_id = [];
    var result = jQuery.parseJSON(jQuery("#filter_json").val());
    var arr_full_last = [];
    let arr_prop = [];
    result.forEach((product) => {
        if (product.properties_filter != null) {
            let prop = jQuery.parseJSON(product.properties_filter);

            var arr_temp = Object.entries(prop);
            arr_temp.sort(function(a, b) {
                return a[1].sort - b[1].sort
            });
            for (const [key, value] of arr_temp) {
                var pos = arr_prop.indexOf(value.name);
                if (pos < 0) {
                    arr_prop.push(value.name);
                }
            }
        }
    });

    arr_full = [];
    arr_prop.forEach((prop) => {
        arr_values = [];
        for (let product of result) {
            let qty = 0;
            if (product.properties_filter != null) {
                let prop_str = jQuery.parseJSON(product.properties_filter);

                for (const [key, value] of Object.entries(prop_str)) {
                    if (prop == value.name) {
                        qty++;
                        var pos = arr_values.indexOf(value.value);
                        if (pos < 0) {
                            arr_values.push(value.value);
                        }
                    }
                }
            }
        }
        item = [];
        item["prop"] = prop;
        item["values"] = arr_values;
        arr_full.push(item);
    });

    for (let product of arr_full) {
        let arr1 = [];
        product["values"].sort();
        for (let val of product["values"]) {
            arr_values = [];
            let qty = 0;
            for (let product of result) {
                if (product.properties_filter != null) {
                    let prop_str = jQuery.parseJSON(product.properties_filter);

                    for (const [key, value] of Object.entries(prop_str)) {
                        if (val == value.value) {
                            qty++;
                        }
                    }
                }
            }
            f = 2;

            arr_values["val"] = val;
            arr_values["qty"] = qty;
            arr1.push(arr_values);
        }
        item = [];
        item["prop"] = product["prop"];
        item["rows"] = arr1;
        arr_full_last.push(item);
    }

    var first = true;
    for (let property of arr_full_last) {
        var article = document.createElement("article");
        article.className = "filter-group";

        var header = document.createElement("header");
        header.className = "card-header";
        var a = document.createElement("a");
        if (first) {
            a.className = "text-decoration-none";
        } else {
            a.className = "text-decoration-none collapsed";
        }

        a.setAttribute("data-bs-toggle", "collapse");
        a.setAttribute(
            "href",
            "#Filter" + translit(property.prop) + "Aside_1XXL"
        );
        a.setAttribute("role", "button");
        a.setAttribute("aria-expanded", "false");
        a.setAttribute(
            "aria-controls",
            "#Filter" + translit(property.prop) + "Aside_1XXL"
        );
        var i = document.createElement("i");
        i.className = "icon-control bi bi-caret-down-fill";
        a.appendChild(i);

        var h6 = document.createElement("h6");
        h6.className = "title b";
        h6.innerText = "" + property.prop + "";
        a.appendChild(h6);
        header.appendChild(a);
        article.appendChild(header);

        var div1 = document.createElement("div");
        if (first) {
            div1.className = "collapse show";
        } else {
            div1.className = "collapse";
        }
        first = false;
        div1.id = "Filter" + translit(property.prop) + "Aside_1XXL";

        var div2 = document.createElement("div");
        div2.className = "d-flex flex-column mb-3";
        for (let prop_val of property.rows) {
            var div3 = document.createElement("div");
            div3.className = "p-2";

            var input = document.createElement("input");
            input.className = "form-check-input filter-check";
            input.setAttribute("type", "checkbox");
            input.setAttribute("data-prop", property.prop);
            input.setAttribute("data-val", prop_val.val);
            input.id = "flexCheckDefault" + prop_val.val;
            div3.appendChild(input);
            var label = document.createElement("label");
            label.className = "form-check-label";
            label.setAttribute("for", "flexCheckDefault" + prop_val.val);
            label.innerText = " " + prop_val.val;
            div3.appendChild(label);
            var span = document.createElement("span");

            var b = document.createElement("b");
            b.className = "float-end badge badge-pill bg-blue filter-qty";
            b.setAttribute("data-prop", property.prop);
            b.setAttribute("data-val", prop_val.val);
            b.innerText = prop_val.qty;
            span.appendChild(b);
            div3.appendChild(span);
            div2.appendChild(div3);
        }
        div1.appendChild(div2);
        article.appendChild(div1);

        var article_lg = article.cloneNode( true );
        var article_md = article.cloneNode( true );
        var article_sm = article.cloneNode( true );
        var article_xl = article.cloneNode( true );
        var article_xxl = article.cloneNode( true );

        $(".sticky-lg")[0].appendChild(article_lg);
        console.log('lg');
        $(".sticky-md")[0].appendChild(article_md);
        console.log('md');
        $(".sticky-sm")[0].appendChild(article_sm);
        console.log('sm');
        $(".sticky-xl")[0].appendChild(article_xl);
        console.log('xl');
        //$(".sticky-xs")[0].appendChild(article);
        //console.log('xs');
        $(".sticky-xxl")[0].appendChild(article_xxl);
        console.log('xxl');
    }

    f = 24;
    setFilters();
});

function setFilters() {
    var json_filter = findGetParameter('filter');
    if (json_filter != null) {
        var last_item_id;
        json_filter = b64_to_utf8(json_filter);
        filter = JSON.parse(json_filter);
        $.each(filter, function(key, value) {
            $.each(value, function(prop_name, prop_val) {

                f = $('[data-prop="' + prop_name + '"]');
                $.each(f, function(index, item) {
                    if (item.dataset.val == prop_val) {
                        if (item.classList.contains('filter-check')) {
                            item.checked = true;
                            last_item_id = item.id;
                        }
                    }
                });
            });



        });

    }
    $('#' + last_item_id + '').prop('checked', false);
    $('#' + last_item_id + '').trigger('click');
    f = 2;
}

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function(item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

$(document).on("click", ".filter-check", function(e) {
    var checked_prop = [];

    $(".filter-check:checked").each(function(index, value) {
        var prop = $(this).data("prop");
        var val = $(this).data("val");
        let item = [];
        item["prop"] = prop;
        item["val"] = val;

        checked_prop.push(item);
    });

    var checked_prop_full = [];
    var temp_arr = [];

    for (var i = 0; i < checked_prop.length; i++) {
        var pos = temp_arr.indexOf(checked_prop[i].prop);
        if (pos < 0) {
            temp_arr.push(checked_prop[i].prop);
            let item_arr = [];
            let val_arr = [];
            item_arr['prop'] = checked_prop[i].prop;
            item_arr['val'] = val_arr;
            checked_prop_full.push(item_arr);

        }
    };



    for (var i = 0; i < checked_prop_full.length; i++) {
        for (var j = 0; j < checked_prop.length; j++) {
            if (checked_prop_full[i].prop === checked_prop[j].prop) {
                checked_prop_full[i].val.push(checked_prop[j].val);
            }
        }
    }

    //Запам'ятаємо для локації

    var filters = $(".filter-check:checked").map(function() {
        var opt = {};
        opt[$(this).data("prop")] = $(this).data("val");
        return opt;
    }).get();

    var json_filters = JSON.stringify(filters);

    json_filters = utf8_to_b64(json_filters);

    var new_url = UpdateQueryString('filter', json_filters);

    history.pushState({}, null, new_url);

    var result = jQuery.parseJSON(jQuery("#filter_json").val());
    let products_id = [];

    var result = jQuery.parseJSON(jQuery("#filter_json").val());
    let arr_prop = [];
    result.forEach((product) => {
        if (product.properties_filter != null) {
            var item = [];
            item["id"] = product.id;
            let prop = jQuery.parseJSON(product.properties_filter);

            for (const [key, value] of Object.entries(prop)) {
                item["" + value.name + ""] = value.value;
            }
            arr_prop.push(item);
        }
    });

    const needed_id = [];
    for (var i = 0; i < arr_prop.length; i++) {
        let product_needed = 1;
        for (var j = 0; j < checked_prop_full.length; j++) {
            let current_prop_value = arr_prop[i][checked_prop_full[j].prop];

            let needed = 0; //властивість потрапила у обрані
            let inner_arr = checked_prop_full[j].val;
            for (l = 0; l < inner_arr.length; l++) {
                if (inner_arr[l] == current_prop_value) {
                    needed = 1;
                }
            }
            if (needed === 0) { //властивість потрапила у обрані
                product_needed = 0;
            }
        }

        if (product_needed === 1) {
            needed_id.push(arr_prop[i]);
        }
    }

    const request_id = [];
    for (let i = 0; i < needed_id.length; i++) {
        request_id.push(needed_id[i].id);
    }
    window.request_id = request_id;
    getDataFilter($(this).data("prop"), $(this)[0].checked);
});

function UpdateQueryString(key, value, url) {
    if (!url) url = window.location.href;
    var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
        hash;

    if (re.test(url)) {
        if (typeof value !== 'undefined' && value !== null) {
            return url.replace(re, '$1' + key + "=" + value + '$2$3');
        } else {
            hash = url.split('#');
            url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
            if (typeof hash[1] !== 'undefined' && hash[1] !== null) {
                url += '#' + hash[1];
            }
            return url;
        }
    } else {
        if (typeof value !== 'undefined' && value !== null) {
            var separator = url.indexOf('?') !== -1 ? '&' : '?';
            hash = url.split('#');
            url = hash[0] + separator + key + '=' + value;
            if (typeof hash[1] !== 'undefined' && hash[1] !== null) {
                url += '#' + hash[1];
            }
            return url;
        } else {
            return url;
        }
    }
}

function calculateCountProductsInFilter(prop, checked) {
    console.log(prop);
    var result = jQuery.parseJSON(jQuery("#filtered_products_json").val());
    let arr_prop = [];
    result.forEach((product) => {
        if (product.properties_filter != null) {
            var item = [];
            item["id"] = product.id;
            let prop = jQuery.parseJSON(product.properties_filter);

            for (const [key, value] of Object.entries(prop)) {
                item["" + value.name + ""] = value.value;
            }
            arr_prop.push(item);
        }
    });
    arr_prop_filtered = arr_prop;
    $(".filter-qty").each(function(index, value) {
        var data_prop = $(this).data("prop");
        var val = $(this).data("val");

        if (prop != data_prop || !checked) {
            let count = 0;
            for (i = 0; i < arr_prop_filtered.length; i++) {
                if (arr_prop_filtered[i][data_prop] == val) {
                    count++;
                }
            }
            $(this)[0].innerText = count;
        }
    });

}

function getDataFilter(prop, checked) {
    if (window.request_id.length == 0) {
        window.request_id.push(999999999)
    }
    $.ajax({
            url: '?ids=' + window.request_id,
            type: "get",
            datatype: "html"
        })
        .done(function(data) {
            //$("#products_wrap").empty().html(data);
            $("#products_wrap_xxl").empty().html(data);
                    $("#products_wrap_xl").empty().html(data);
                    $("#products_wrap_lg").empty().html(data);
                    $("#products_wrap_md").empty().html(data);
                    $("#products_wrap_sm").empty().html(data);
            calculateCountProductsInFilter(prop, checked);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
}

function translit(word) {
    var answer = "";
    var converter = {
        а: "a",
        б: "b",
        в: "v",
        г: "g",
        д: "d",
        е: "e",
        ё: "e",
        ж: "zh",
        з: "z",
        и: "i",
        й: "y",
        к: "k",
        л: "l",
        м: "m",
        н: "n",
        о: "o",
        п: "p",
        р: "r",
        с: "s",
        т: "t",
        у: "u",
        ф: "f",
        х: "h",
        ц: "c",
        ч: "ch",
        ш: "sh",
        щ: "sch",
        ь: "",
        ы: "y",
        ъ: "",
        э: "e",
        ю: "yu",
        я: "ya",

        А: "A",
        Б: "B",
        В: "V",
        Г: "G",
        Д: "D",
        Е: "E",
        Ё: "E",
        Ж: "Zh",
        З: "Z",
        И: "I",
        Й: "Y",
        К: "K",
        Л: "L",
        М: "M",
        Н: "N",
        О: "O",
        П: "P",
        Р: "R",
        С: "S",
        Т: "T",
        У: "U",
        Ф: "F",
        Х: "H",
        Ц: "C",
        Ч: "Ch",
        Ш: "Sh",
        Щ: "Sch",
        Ь: "",
        Ы: "Y",
        Ъ: "",
        Э: "E",
        Ю: "Yu",
        Я: "Ya",
        " ": "_",
        ".": "",
        "(": "",
        ")": "",
    };

    for (var i = 0; i < word.length; ++i) {
        if (converter[word[i]] == undefined) {
            answer += word[i];
        } else {
            answer += converter[word[i]];
        }
    }

    return answer;
}

jQuery(document).ready(function($) {

    //Use this inside your document ready jQuery
    $(window).on('popstate', function() {
        location.reload(true);
    });

});

function utf8_to_b64(str) {
    return window.btoa(unescape(encodeURIComponent(str)));
}

function b64_to_utf8(str) {
    return decodeURIComponent(escape(window.atob(str)));
}
