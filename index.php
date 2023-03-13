<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="container mx-auto">
        <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
            <div class="flex flex-col justify-center ">
                <!-- Table -->
                <div class="w-full max-w-4xl mx-auto bg-white shadow-sm rounded-sm border border-gray-20 mt-10">
                    <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
                        <h2 class="font-semibold text-3xl text-gray-800">Users</h2>
                        <a href="form.php"
                            class=" inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-sm font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">Add
                            User</a>
                    </header>
                    <div class="p-3">
                        <div class="max-w-4xl mx-auto my-10">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left">Name</th>
                                        <th class="px-4 py-2 text-left">Email</th>
                                        <th class="px-4 py-2 text-left">Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $users = array_map('str_getcsv', file('users.csv'));
                                    foreach ($users as $user) {
                                        echo "<tr>";
                                        echo "<td class='border px-4 py-2'>" . $user[0] . "</td>";
                                        echo "<td class='border px-4 py-2'>" . $user[1] . "</td>";
                                        echo "<td class='border px-4 py-2 w-32 h-32'><img src='uploads/" . $user[2] . "' alt='Profile Picture'></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>