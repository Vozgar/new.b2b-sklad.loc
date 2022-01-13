<h2>{{ $price->name }}</h2>
<div id="treeview-{{ $price->id }}" class=""></div>

<script type="text/javascript">
    $(function() {

        $.ajax({
                url: '/tree-category?price_id='+{{ $price->id }},
                type: "get",
                datatype: "html"
            })
            .done(function(data) {
                $('#treeview-{{ $price->id }}').treeview({
                    data: data,
                    levels: 1,
                    expandIcon: 'bi bi-folder-plus',
                    collapseIcon: 'bi bi-folder-minus',
                    checkedIcon: 'bi bi-check-square',
                    uncheckedIcon: 'bi bi-square',
                    showCheckbox: true,
                    onNodeChecked: function(event, dat) {

                        $.ajax({
                            url: '/price/check-category?price_id=' +
                                {{ $price->id }} + '&category_id=' + dat['id'] +
                                '&check=1',
                            type: 'get',
                            datatype: 'html'
                        });
                        if (dat.nodes != undefined) {
                            dat.nodes.forEach(element => {

                                $('#treeview-{{ $price->id }}').treeview('checkNode',
                                    [
                                        element['nodeId'], {
                                            silent: true
                                        }
                                    ]);
                                $.ajax({
                                    url: '/price/check-category?price_id=' +
                                        {{ $price->id }} + '&category_id=' +
                                        element['id'] + '&check=1',
                                    type: 'get',
                                    datatype: 'html'
                                });
                            });
                        };
                    },
                    onNodeUnchecked: function(event, dat) {
                        $.ajax({
                            url: '/price/check-category?price_id=' +
                                {{ $price->id }} + '&category_id=' + dat['id'] +
                                '&check=0',
                            type: 'get',
                            datatype: 'html'
                        });
                        if (dat.nodes != undefined) {
                            dat.nodes.forEach(element => {
                                $.ajax({
                                    url: '/price/check-category?price_id=' +
                                        {{ $price->id }} + '&category_id=' +
                                        element['id'] + '&check=0',
                                    type: 'get',
                                    datatype: 'html'
                                });
                                $('#treeview-{{ $price->id }}').treeview(
                                    'uncheckNode', [
                                        element['nodeId'], {
                                            silent: true
                                        }
                                    ]);
                            });
                        };
                    },

                });
                // $('#treeview-{{ $price->id }}').treeview('checkNode', [0, {
                //     silent: true
                // }]);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('No response from server');
            });




    });

</script>
