<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Cards</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #212529; /* Dark background for contrast */
        }
        .card {
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-body p, .card-body h5, .card-body .fa {
            font-family: 'Times New Roman', Times, serif;
            color: white;
        }
        .animated-background {
            position: relative;
            overflow: hidden;
            background: #333;
            border-radius: 8px;
        }
        .animated-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 25%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.1) 75%);
            animation: shine 1.5s infinite;
        }
        @keyframes shine {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }
        .icon {
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid px-4">
        <div class="row mb-4">
            <div class="col-lg-12 mb-4 bg-dark text-white">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="h5 mb-0 text-gray-800">Welcome <?=session()->get('username')?>!</h3>
                        <p class="card-text">Our Burger Menu</p>
                        <div class="row mb-4">
                            <!-- Users Card -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="card animated-background">
                                    <div class="card-body text-center">
                                        <i class="fas fa-users icon"></i>
                                        <h5 class="card-title">Number of Users</h5>
                                        <p class="card-text"><?= $user ?></p>

                                    </div>
                                </div>
                            </div>
                            <!-- Transactions Card -->
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="card animated-background">
                                    <div class="card-body text-center">
                                        <i class="fas fa-check-circle icon"></i>
                                        <h5 class="card-title">Successful Transactions</h5>
                                        <p class="card-text"><?= $transaction_count ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Card 1 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card animated-background">
                                    <img class="card-img-top" src="<?=base_url('img/burger1.jpg')?>" alt="Image 1" style="height: 250px; object-fit: cover;">
                                    <div class="card-body">
                                        <p>Burger CAAEM: A juicy beef patty topped with melted cheddar cheese, fresh lettuce, ripe tomato, and a special secret sauce, all sandwiched between a toasted sesame seed bun.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card animated-background">
                                    <img class="card-img-top" src="<?=base_url('img/burger2.jpg')?>" alt="Image 2" style="height: 250px; object-fit: cover;">
                                    <div class="card-body">
                                        <p>Burger Bitch: Crispy fried chicken breast coated in a zesty buffalo sauce, topped with crunchy lettuce, tangy pickles, and creamy mayo, all served on a warm brioche bun.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 3 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card animated-background">
                                    <img class="card-img-top" src="<?=base_url('img/burger3.jpeg')?>" alt="Image 3" style="height: 250px; object-fit: cover;">
                                    <div class="card-body">
                                        <p>Burger SLAYYYY: A hearty plant-based patty made from a blend of nutritious vegetables and beans, topped with fresh avocado slices, crisp lettuce, ripe tomato, and vegan mayo, all on a whole grain bun.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 4 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card animated-background">
                                    <img class="card-img-top" src="<?=base_url('img/burger4.jpg')?>" alt="Image 4" style="height: 250px; object-fit: cover;">
                                    <div class="card-body">
                                        <p>Burger kawaii: Two savory beef patties grilled to perfection, layered with crispy bacon strips, melted Swiss cheese, caramelized onions, and a special BBQ sauce, all on a toasted pretzel bun.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 5 -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card animated-background">
                                    <img class="card-img-top" src="<?=base_url('img/burger5.jpeg')?>" alt="Image 5" style="height: 250px; object-fit: cover;">
                                    <div class="card-body">
                                        <p>Burger black: A black bun with that taste just like Lebron James ass. It's so delicous that you will scream "AMBATUKAMMMM". No joke. It's a popular dish among the skibidi people.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more cards for additional images -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- AJAX Script to Fetch Data -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'fetch_counts.php', // URL to your PHP script that fetches counts
                type: 'GET',
                success: function(data) {
                    var counts = JSON.parse(data);
                    $('#user-count').text(counts.users);
                    $('#transaction-count').text(counts.transactions);
                },
                error: function() {
                    $('#user-count').text('Error');
                    $('#transaction-count').text('Error');
                }
            });
        });
    </script>
</body>
</html>
