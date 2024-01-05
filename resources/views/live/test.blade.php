<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smooth Scroll Demo</title>
</head>

<body>
    <div>
        <h1>Content</h1>
        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>
        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>
        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>
        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>
        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>
        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <p>This is a test content. Scroll down to see the smooth scroll in action!</p>

        <script>
            let totalHeight = document.body.scrollHeight;
            let scrollDuration = 8000; // Тривалість прокрутки (в мілісекундах)
            const scrollStep = 50; // Крок прокрутки (в пікселях)
            let currentPosition = 0;

            // Прокрутка сторінки
            const smoothScroll = () => {
                if (currentPosition < totalHeight) {
                    window.scrollTo(0, currentPosition);
                    currentPosition += scrollStep;
                    setTimeout(smoothScroll, scrollDuration / totalHeight);
                } else {
                    window.location.reload();
                }
            };

            // Початок уповільненої прокрутки при завантаженні сторінки
            smoothScroll();

            // Функція для збільшення тривалості прокрутки
            const increaseScrollDuration = () => {
                scrollDuration += 1000; // Збільшуємо тривалість на 1 секунду
            };

            // Функція для зменшення тривалості прокрутки
            const decreaseScrollDuration = () => {
                if (scrollDuration > 1000) {
                    scrollDuration -= 1000; // Зменшуємо тривалість на 1 секунду, але не менше 1000 мс
                }
            };

            // Створення кнопок зміни тривалості прокрутки
            const increaseButton = document.createElement('button');
            increaseButton.textContent = 'Збільшити тривалість';
            increaseButton.onclick = increaseScrollDuration;

            const decreaseButton = document.createElement('button');
            decreaseButton.textContent = 'Зменшити тривалість';
            decreaseButton.onclick = decreaseScrollDuration;

            document.body.appendChild(increaseButton);
            document.body.appendChild(decreaseButton);
        </script>
    </div>
    
</body>

</html>
