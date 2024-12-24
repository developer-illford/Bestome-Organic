const categoryButtons = document.querySelectorAll('.category_button');
        const productCards = document.querySelectorAll('.productCol');
        // const productcolum = document.getElementsByClassName('.productCol');

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove the active class from all buttons
                categoryButtons.forEach(btn => btn.classList.remove('active'));

                // Add the active class to the clicked button
                button.classList.add('active');

                // Get the selected category
                const category = button.getAttribute('data-category');

                // Filter products based on the selected category
                productCards.forEach(card => {
                    const productCategory = card.getAttribute('data-category');
                    if (category === 'all' || productCategory === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
