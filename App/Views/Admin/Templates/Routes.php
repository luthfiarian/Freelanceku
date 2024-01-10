<?php
class RoutesPage
{
    public static function Page($Page)
    {
?>
        <section id="routes" class="mt-3">
            <div class="container">
                <div class="w-full">
                    <h1 class="text-xl md:text-2xl font-semibold md:font-bold"><?= $Page ?></h1>
                    <div class="w-full rounded-md p-2 bg-neutral-300">
                        <p class="text-sm"><?= $_SERVER['REQUEST_URI']; ?></p>
                    </div>
                </div>
            </div>
        </section>
<?php
        return true;
    }
}
