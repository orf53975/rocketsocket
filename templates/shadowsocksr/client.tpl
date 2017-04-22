<link rel="stylesheet" type="text/css" href="/modules/servers/rocketsocket/templates/shadowsocksr/stylesheets.css">

<div class="flex no-wrap">
    <div class="rs-post-wrapper col-md-12" style="background-color: white; padding-top: 10px; padding-bottom: 10px">
        <div class="rs-post-top flex no-column no-wrap">
            <div class="rs-post-top-left">
                <img src="http://jobpress.wecookcode.com/demo/images/company-logo-big01.jpg">
            </div>
            <div class="rs-post-top-right">
                <h4 class="dark">{$client.firstname} {$client.lastname}</h4>
                <h5>{$LANG.clientareahostingregdate} {$regdate}</h5>
                <div class="rs-post-meta flex items-center no-column no-wrap">
                    <div class="bookmarked-rs-meta flex items-center no-wrap no-column">
                        <h6 style="font-size: 11px" class="bookmarked-rs-category">{$product}</h6>
                        <h6 style="font-size: 11px" class="candidate-location">{$paymentmethod} {$recurringamount}</h6>
                        <h6 style="font-size: 11px" class="hourly-rate">{$status}</h6>
                    </div>
                </div> <!-- end .rs-post-meta -->
            </div> <!-- end .right-side-inner -->
        </div> <!-- end .rs-post-top -->

        <div>
            <h4 class="dark">Usage</h4>
            <ul class="rs-post-nested-list list-unstyled" style="text-indent: 1rem;">
                <li class="flex no-column no-wrap">
                    <span><i class="fa fa-link"></i></span> {$account.port}
                </li>
                <li class="flex no-column no-wrap">
                    <span><i class="fa fa-circle-o"></i></span>{bandwidth_convert($account['transfer_enable'], 'bytes', 'mb')}
                </li>
                <li class="flex no-column no-wrap">
                    <span><i class="fa fa-circle-o-notch"></i></span>{bandwidth_convert($account['d'] + $account['u'], 'bytes', 'mb')}
                </li>
                <li class="flex no-column no-wrap">
                    <span><i class="fa fa-exchange"></i></span>{bandwidth_convert($account['transfer_enable'] - ($account['d'] + $account['u']), 'bytes', 'mb')}
                </li>
                <li class="flex no-column no-wrap">
                    <span><i class="fa fa-arrow-up"></i></span>{bandwidth_convert($account['u'], 'bytes', 'mb')}
                </li>
                <li class="flex no-column no-wrap">
                    <span><i class="fa fa-arrow-down"></i></span>{bandwidth_convert($account['d'], 'bytes', 'mb')}
                </li>
                <li class="flex no-column nowrap">
                    {$account.method} {$account.obfs}
                </li>
            </ul> <!-- end .rs-post-nested-list -->
        </div> <!-- end .rs-post-bottom -->
    </div> <!-- end .left-side-inner -->
</div>
<br>
<div class="page-content flex no-wrap space-between candidates-listing" style="width: 100%">
    <div class="candidate flex no-wrap no-column"  style="width: 100%">
        <div class="candidate-info">
            <h4 class="candidate-name">Hongkong</h4>
            <h5 class="candidate-designation">hk.s.lemon.hk</h5>
            <p class="candidate-description ultra-light">China direct.</p>
        </div> <!-- end .candidate-info -->
    </div>
    <div class="spacer-xs"></div>
</div>
