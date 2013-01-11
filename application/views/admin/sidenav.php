<div class="cPanel">
<div class="topClear"></div>
	<ul>
        <li<?= ( $thisPage == 'dashboard' ? ' class="currentPage"' : '' ) ?>><a href="<?= base_url() ?>admin/">Home</a></li>
        <li<?= ( $thisPage == 'mControl' ? ' class="currentPage"' : '' ) ?>><a href="<?= base_url() ?>admin/mControl/">Member Control</a></li>
        <li<?= ( $thisPage == 'pControl' ? ' class="currentPage"' : '' ) ?>><a href="<?= base_url() ?>admin/pControl/">Project Control</a></li>
        <li<?= ( $thisPage == 'projectFeeds' ? ' class="currentPage"' : '' ) ?>><a href="">Project Feeds</a></li>
        <li<?= ( $thisPage == 'transactions' ? ' class="currentPage"' : '' ) ?>><a href="">Transactions</a></li>
        <li<?= ( $thisPage == 'preferences' ? ' class="currentPage"' : '' ) ?>><a href="">Preferences</a></li>
        <li<?= ( $thisPage == 'metrics' ? ' class="currentPage"' : '' ) ?>><a href="">Metrics</a></li>
    </ul>
</div>