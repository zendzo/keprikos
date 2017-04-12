    <script>
        var options = {
            url: function (pharse) {
                return "api/v1/kost-search-autocomplete?keyword="+pharse;
            },

            getValue: "name",

            template: {
                type: "custom",
                method: function(value,item){
                    return "<a href='kost-search?keyword="+item.name+"'>"+item.name+"</a>"+
                        "<span>"+item.address+" - "+item.city+"</span>";
                },
                description: "address"
            },

            listLocation : "kosts",

            list: {
                match: {
                    enabled: true
                }
            },

            theme: "plate-dark"
        };

        $("#search-kost").easyAutocomplete(options);
    </script>