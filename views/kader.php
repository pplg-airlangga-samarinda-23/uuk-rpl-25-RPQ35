<?php

?>


<header class=" bg-amber-200 w-full flex flex-row justify-between px-10 sticky top-0">
    <section class="flex flex-row items-center gap-x-3">
        <img src="" alt="" class=" h-8 max-h-8 max-w-8 w-8 rounded-full border border-black  bg-stone-300">
        <h2 class="text-lg font-bold"><?= $_SESSION['username'] ?> </h2>
    </section>
    <button onclick="window.location.href='backside/kader-proses.php';">Refresh</button>
    <section class="flex flex-row items-center gap-x-3">
        <h2 class="text-lg font-bold"><?= $_SESSION['role'] ?></h2>
        <form action="backside/kader-proses.php" method="POST" class="flex flex-row sm:gap-x-10 gap-x-3">
            <button class="border border-black rounded-lg bg-stone-300 hover:bg-red-500 " name="log-out">log-out</button>
        </form>
    </section>
</header>

<main class="lg:flex lg:flex-row lg:gap-x-20">

    <table class="table">
        <thead class="sticky top-100 w-80">
            <th class="text-m bg-blue-300 rounded-l-lg px-5">no</th>
            <th class="text-m bg-blue-300 px-5">nama</th>
            <th class="text-m bg-blue-300 px-5">berat badan</th>
            <th class="text-m bg-blue-300 px-5">tinggi badan</th>
            <th class="text-m bg-blue-300 px-5 rounded-r-lg">inspect</th>

        </thead>
        <tbody class="bg-stone-200">
            <?php
            $index = 1;
            foreach (explode("!", $_SESSION['kader_out']) as $row) {
                $row = unserialize($row);
                // var_dump($row);
                if ($row == null) {
                    continue;
                }
            ?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['berat_badan'] ?></td>
                    <td><?= $row['tinggi_badan'] ?></td>
                    <td>
                        <form action="backside/kader-proses.php" method="post" class="flex flex-row items-center justify-center">
                            <button class=" rounded-full hover:bg-yellow-200" value="<?= $row['id'] ?>" name="kader-open">open</button>
                        </form>
                    </td>
                </tr>

            <?php
                $index++;
            }
            ?>
        </tbody>
        <tfoot class="bg-amber-200 py-px">
            <form action="backside/kader-proses.php" method="post">
                <td>new</td>
                <td><input type="text"   name="nimang" id="" class="border border-black rounded-lg"></td>
                <td><input type="number" name="niming" id="" class="border border-black rounded-lg"></td>
                <td><input type="number" name="nimong" id="" class="border border-black rounded-lg"></td>
                <td><button name="adder" class="bg-green-500 rounded-xl border border-black p-px hover:bg-green-700">add new</button></td>
            </form>
        </tfoot>
    </table>

    <section class="w-48 h-64 my-10 sticky">
        <div class="bg-blue-300 w-52 h-1/6 flex flex-row items-center justify-center">
            <h2 class="text-m"><?= $_SESSION['nama_bayi'] ?></h2>
        </div>
        <div class="bg-amber-300 h-5/6 w-52">
            <form action="backside/kader-proses.php" method="post" class="flex flex-col p-1">
                <label for="">berat badan</label>
                <input type="number" name="berat_bayi" id="" value="<?= $_SESSION['berat-an'] ?>">
                <label for="">tinggi badan</label>
                <input type="number" name="tinggi_bayi" id="" value="<?= $_SESSION['tinggi-an'] ?>">
                <div class="flex flex-row gap-x-12 mt-20">
                    <button name="open" class="bg-yellow-500 rounded-full" value="<?= $_SESSION['nama_bayi'] ?>">full data</button>
                    <div class="flex flex-row gap-x-2 ">
                        <button type="submit" value="<?= $_SESSION['nama_bayi'] ?>" name="bayi_update" class="bg-green-500 rounded-full">update</button>
                        <button name="restes" class="bg-red-500 rounded-full">reset</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
</main>
<?php
if (isset($_POST['paham'])) {
    unset($_POST['paham']);
    unset($_SESSION['pesanan']);
}
if ($_SESSION['pesanan'] != null) {
?>
    <div id="pesan" class="fixed bg-red-400 w-48 h-48 mt-48 p-8">
        <h2 class="text-m font-bold"><?= $_SESSION['pesanan'] ?></h2>
        <form action="" method="post">
            <button class="w-14 h-14 bg-green-500 rounded-full mt-5" name="paham">paham</button>
        </form>
    </div>

<?php }
?>