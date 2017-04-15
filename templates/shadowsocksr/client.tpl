<link rel="stylesheet" type="text/css" href="/modules/servers/rocketsocket/templates/shadowsocksr/stylesheets.css">
<div class="rsocket">
    <section class="rs-panel rs-panel-default m-b-lg">
        <section class="rs-panel-body undefined">
            <h4>Your Information</h4>
            <h2>{$client.firstname} {$client.lastname}</h2>
            <p class="text-muted">{$account.transfer_enable} MB</p>
            <p class="text-muted">{$account.u + $account.d}</p>
            <p class="text-muted">{$account.t}</p>
            <hr>
            <h4>Available Servers</h4>
            <table class="table m-b-none m-t-xl">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Server</th>
                        <th>Encryption</th>
                        <th>Protocol</th>
                        <th>Obfs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-none"><b>Hongkong</b></td>
                        <td class="border-none">China Direct</td>
                        <td class="border-none">hk.s.ss-server.net</td>
                        <td class="border-none">chacha20</td>
                        <td class="border-none">origin</td>
                        <td class="border-none">plain</td>
                        <td class="text-danger border-none">
                            <button class="btn btn-success btn-sm">
                                <span class="text">Generate QRCode</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>
</div>
