<div class="cPanel">
<div class="topClear"></div>
	<ul>
        <li<?= ( $thisPage == 'dashboard' ? ' class="currentPage"' : '' ) ?>><a href="<?= base_url() ?>admin/">Home</a></li>
        <li<?= ( $thisPage == 'cPanel' ? ' class="currentPage"' : '' ) ?>><a href="<?= base_url() ?>admin/cPanel/">Control Panel</a></li>
    	<li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">My Projects</a></li>
        <li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">Project Feeds</a></li>
        <li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">Transactions</a></li>
        <li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">Preferences</a></li>
        <li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">Metrics</a></li>
        <li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">Fraction Flash Cards</a></li>
        <li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">CMS Design</a></li>
        <li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">PayPal Calculator</a></li>
        <li<?= ( $thisPage == '' ? ' class="currentPage"' : '' ) ?>><a href="">Vanguard</a></li>
    </ul>
</div>