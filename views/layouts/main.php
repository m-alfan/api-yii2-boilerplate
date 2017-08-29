<?php
    /* @var $this \yii\web\View */
    /* @var $content string */
    use yii\helpers\Html;
    use app\assets\AppAsset;
    use yii\helpers\Url;

    AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=Url::to('@web/favicon.ico')?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
        .CodeMirror {
            border: 1px solid #eee;
            height: auto;
        }
    </style>
    <script type="text/javascript">
        jQuery.browser = jQuery.browser || {};
        (function () {
            jQuery.browser.msie = jQuery.browser.msie || false;
            jQuery.browser.version = jQuery.browser.version || 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();
    </script>

    <script type="text/javascript">
        function setupCodemirror() {
            $('textarea').each(function(index) {
                $(this).attr('id', 'code-' + index);
                var codeMirror = CodeMirror.fromTextArea(document.getElementById('code-' + index), {
                    mode: "application/json",
                    lineNumbers: true,
                    tabMode: "indent",
                    gutters: ["CodeMirror-lint-markers"],
                    lint: true,
                    viewportMargin: Infinity,
                    autoRefresh: true,
                    autoCloseBrackets: true,
                    matchBrackets: true,
                    theme: 'eclipse'
                });
                codeMirror.on('blur', function(mirror) {
                    mirror.save()
                })
                codeMirror.setValue("{\n  \n}")
                codeMirror.save()
            });
            $('.samples').each(function() {
                $(this).find('.snippet:first pre code').click(function() {
                    var json = $(this).text()
                    $(this).parents('.operation').first().find('.CodeMirror').each(function(i, el){
                        el.CodeMirror.getDoc().setValue(json);
                    });
                })
            });

            $('input[name="query"]').each(function(index) {
                $(this).attr('id', 'query-code-' + index);
                var codeMirror = CodeMirror.fromTextArea(document.getElementById('query-code-' + index), {
                    mode: "application/json",
                    lineNumbers: true,
                    tabMode: "indent",
                    gutters: ["CodeMirror-lint-markers"],
                    lint: true,
                    viewportMargin: Infinity,
                    autoRefresh: true,
                    autoCloseBrackets: true,
                    matchBrackets: true,
                    theme: 'eclipse'
                });
                codeMirror.on('blur', function(mirror) {
                    mirror.save()
                })
                codeMirror.setValue('{}')
                $(this).parent().find('.markdown').click(function(){
                    var json = $(this).text()
                    codeMirror.getDoc().setValue(json)
                    codeMirror.save()
                })
            });
        }
    </script>

    <script type="text/javascript">
        $(function () {
            var url = window.location.search.match(/url=([^&]+)/);
            if (url && url.length > 1) {
                url = decodeURIComponent(url[1]);
            } else {
                url = "<?=yii\helpers\Url::toRoute('resource', true)?>"
            }

            window.swaggerUi = new SwaggerUi({
                url: url,
                dom_id: "swagger-ui-container",
                supportedSubmitMethods: ['get', 'post', 'put', 'delete', 'patch'],
                onComplete: function (swaggerApi, swaggerUi) {
                    if (typeof initOAuth == "function") {
                        initOAuth({
                            clientId: "ffe7748a-3a3f-4860-a02a-42ab08e4fde2",
                            realm: "realm",
                            appName: "Swagger"
                        });
                    }

                    $('pre code').each(function (i, e) {
                        hljs.highlightBlock(e)
                    });

                    $('#input_apiKey').change(addApiKeyAuthorization);

                    if (swaggerUi.options.url) {
                        $('#input_baseUrl').val(swaggerUi.options.url);
                    }

                    var apiKey = swaggerUi.options.apiKey || localStorage.getItem("apiKey");

                    if (apiKey) {
                        $('#input_apiKey').val(apiKey)
                    }


                    $("[data-toggle='tooltip']").tooltip();

                    setupCodemirror()

                    addApiKeyAuthorization()

                },
                onFailure: function (data) {
                    log("Unable to Load SwaggerUI");
                },
                docExpansion: "none",
                sorter: "alpha",
                defaultModelRendering: 'schema',
                showRequestHeaders: false,
                showOperationIds: false
            });

            function addApiKeyAuthorization() {
                var key = encodeURIComponent($('#input_apiKey').val());
                if (key && key.trim(' ') != "") {
                    var apiKeyAuth = new SwaggerClient.ApiKeyAuthorization("Authorization", "Bearer " + key, "header");
                    window.swaggerUi.api.clientAuthorizations.add("apiKey", apiKeyAuth);
                    log("added key " + key);
                    localStorage.setItem("apiKey", key);
                } else {
                    window.swaggerUi.api.clientAuthorizations.remove('apiKey')
                    localStorage.removeItem("apiKey")
                }
            }

            $('#input_apiKey').change(addApiKeyAuthorization);
            // if you have an apiKey you would like to pre-populate on the page for demonstration purposes...

            window.swaggerUi.load();

            function log() {
                if ('console' in window) {
                    console.log.apply(console, arguments);
                }
            }
        });
    </script>

    <script type="text/javascript">

        $(function () {

            $(window).scroll(function () {
                var sticky = $(".sticky-nav");

                i(sticky);
                r(sticky);

                function n() {
                    return window.matchMedia("(min-width: 992px)").matches
                }

                function e() {
                    n() ? sticky.parents(".sticky-nav-placeholder").removeAttr("style") : sticky.parents(".sticky-nav-placeholder").css("min-height", sticky.outerHeight())
                }

                function i(n) {
                    n.hasClass("fixed") || (navOffset = n.offset().top);
                    e();
                    $(window).scrollTop() > navOffset ? $(".modal.in").length || n.addClass("fixed") : n.removeClass("fixed")
                }

                function r(e) {
                    function i() {
                        var i = $(window).scrollTop(), r = e.parents(".sticky-nav");
                        return r.hasClass("fixed") && !n() && (i = i + r.outerHeight() + 40), i
                    }

                    function r(e) {
                        var t = o.next("[data-endpoint]"), n = o.prev("[data-endpoint]");
                        return "next" === e ? t.length ? t : o.parent().next().find("[data-endpoint]").first() : "prev" === e ? n.length ? n : o.parent().prev().find("[data-endpoint]").last() : []
                    }

                    var nav = e.find("[data-navigator]");
                    if (nav.find("[data-endpoint][data-selected]").length) {
                        var o = nav.find("[data-endpoint][data-selected]"),
                            a = $("#" + o.attr("data-endpoint")),
                            s = a.offset().top,
                            l = (s + a.outerHeight(), r("next")),
                            u = r("prev");
                        if (l.length) {
                            {
                                var d = $("#" + l.attr("data-endpoint")), f = d.offset().top;
                                f + d.outerHeight()
                            }
                            i() >= f && c(l)
                        }
                        if (u.length) {
                            var p = $("#" + u.attr("data-endpoint")),
                                g = u.offset().top;
                            v = (g + p.outerHeight(), 100);
                            i() < s - v && c(u)
                        }
                    }
                }

                function s() {
                    var e = $(".sticky-nav [data-navigator]"),
                        n = e.find("[data-endpoint]").first();
                    n.attr("data-selected", "");
                    u.find("[data-selected-value]").html(n.text())
                }

                function c(e) {
                    {
                        var n = $(".sticky-nav [data-navigator]");
                        $("#" + e.attr("data-endpoint"))
                    }
                    n.find("[data-resource]").removeClass("active");
                    n.find("[data-selected]").removeAttr("data-selected");
                    e.closest("[data-resource]").addClass("active");
                    e.attr("data-selected", "");
                    sticky.find("[data-selected-value]").html(e.text())
                }
            });

        });
    </script>

    <script type="text/javascript">
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script
</head>

<body class="page-docs" style="zoom: 1;">
    <?php $this->beginBody() ?>
    <header class="site-header">
        <nav role="navigation" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse" class="navbar-toggle"><span
                            class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span></button>
                    <h1 class="navbar-brand"><a href="{{ 'swaggerUI' | route() }}"><span>Api document</span></a></h1>
                </div>
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="li-why"><a href="{{ 'swaggerUI' | route() }}" style="font-size: 25px; padding-left: 0px">Api document</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?= $content?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>