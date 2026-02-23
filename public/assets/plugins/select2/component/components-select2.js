

        // Set the "bootstrap" theme as the default theme for all Select2
        // widgets.
        //
        // @see https://github.com/select2/select2/issues/2927
        $.fn.select2.defaults.set("theme", "bootstrap");

        var placeholder = "Select a State";

        $(".select2, .select2-multiple").select2({
            placeholder: placeholder,
            width: null
        });

        $(".select2-allow-clear").select2({
            allowClear: true,
            placeholder: placeholder,
            width: null
        });

        // @see https://select2.github.io/examples.html#data-ajax
        function formatRepo(repo) {
            if (repo.loading) return repo.text;

            var markup = "<div class='select2-result-repository__title'>" + repo.name + "("+ repo.mobile +")" + "</div>";

            return markup;
        }

        function formatRepoSelection(repo) {
            return repo.name || repo.text;
        }
        function formatRepoSelectionMobile(repo) {
            // console.log(repo.);
            return repo.mobile || repo.mobile;
        }
        function formatRepoMobile(repo) {
            if (repo.loading) return repo.text;
            
            var markup = "<option value=" + repo.mobile + " name='pay_mobile'>" + repo.name + "("+ repo.mobile +")" + "</option>";

            return markup;
        }
        function clientformatRepo(repo) {
            if (repo.loading) return repo.text;

            var markup = "<div class='select2-result-repository__title'>" + repo.merchant_name + "("+ repo.mobile +")" + "</div>";

            return markup;
        }

        function clientformatRepoSelection(repo) {
            return repo.merchant_name || repo.text;
        }

        $(".js-data-customer-ajax").select2({
            placeholder: "Choose Customer",
            width: "off",
            ajax: {
                url: "/customer/filter_search",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                  // parse the results into the format expected by Select2
                  // since we are using custom formatting functions we do not need to
                  // alter the remote JSON data, except to indicate that infinite
                  // scrolling can be used
                  params.page = params.page || 1;

                  return {
                    results: data.data,
                    pagination: {
                      more: (params.page * 10) < data.total
                    }
                  };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection
        });
        $(".js-data-mobile-ajax").select2({
            placeholder: "Type Mobile No",
            width: "off",
            ajax: {
                url: "/customer/filter_search",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },

                processResults: function (data, params) {
                  // parse the results into the format expected by Select2
                  // since we are using custom formatting functions we do not need to
                  // alter the remote JSON data, except to indicate that infinite
                  // scrolling can be used
                  params.page = params.page || 1;
                    console.log(data.data);
                  return {
                    results: data.data,
                    pagination: {
                      more: (params.page * 10) < data.total
                    }
                  };
                },
                cache: true
            },
            escapeMarkup: function(markup) {   
                return markup;
            }, // let our custom formatter work
            templateResult: formatRepoMobile,
            templateSelection: formatRepoSelectionMobile
        }).on("change", function(e) { 
        //   var data =$('#select2-data_mobile-container').clone().children().remove().end().text();
          var data =$(".js-data-mobile-ajax").select2('data');
        //   var select =$('#data_mobile'); 
          var addData = $('#data_mobile').val(data[0].mobile);
          console.log(addData);
         });
        $(".js-data-client-ajax").select2({
            placeholder: "Choose Client",
            width: "off",
            ajax: {
                url: "/client/filter_search",
                dataType: 'json',
                delay: 250,
                data: function(params) {

                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                  // parse the results into the format expected by Select2
                  // since we are using custom formatting functions we do not need to
                  // alter the remote JSON data, except to indicate that infinite
                  // scrolling can be used
                  params.page = params.page || 1;
                  return {
                    results: data.data,
                    pagination: {
                      more: (params.page * 10) < data.total
                    }
                  };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: clientformatRepo,
            templateSelection: clientformatRepoSelection
        });

        $("button[data-select2-open]").click(function() {
            $("#" + $(this).data("select2-open")).select2("open");
        });

        $(":checkbox").on("click", function() {
            $(this).parent().nextAll("select").prop("disabled", !this.checked);
        });

        // copy Bootstrap validation states to Select2 dropdown
        //
        // add .has-waring, .has-error, .has-succes to the Select2 dropdown
        // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
        // body > .select2-container) if _any_ of the opened Select2's parents
        // has one of these forementioned classes (YUCK! ;-))
        $(".select2, .select2-multiple, .select2-allow-clear, .js-data-example-ajax, .js-data-customer-ajax, .js-data-client-ajax").on("select2:open", function() {
            if ($(this).parents("[class*='has-']").length) {
                var classNames = $(this).parents("[class*='has-']")[0].className.split(/\s+/);

                for (var i = 0; i < classNames.length; ++i) {
                    if (classNames[i].match("has-")) {
                        $("body > .select2-container").addClass(classNames[i]);
                    }
                }
            }
        });

        $(".js-btn-set-scaling-classes").on("click", function() {
            $("#select2-multiple-input-sm, #select2-single-input-sm").next(".select2-container--bootstrap").addClass("input-sm");
            $("#select2-multiple-input-lg, #select2-single-input-lg").next(".select2-container--bootstrap").addClass("input-lg");
            $(this).removeClass("btn-primary btn-outline").prop("disabled", true);
        });
    