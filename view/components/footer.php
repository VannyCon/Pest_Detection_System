<script>
    function formatSolution() {
        const solutionElement = document.getElementById('solution');
        if (!solutionElement) return;

        let text = solutionElement.innerText;

        // Split the text by numbers followed by a dot
        let items = text.split(/\d+\.\s*/).filter(item => item.trim() !== '');

        // Create a new numbered list
        let formattedHTML = '<ol>';
        items.forEach(item => {
            formattedHTML += `<li>${item.trim()}</li>`;
        });
        formattedHTML += '</ol>';

        // Replace the content of the solution element
        solutionElement.innerHTML = formattedHTML;
    }
</script>

<!-- Corrected Bootstrap and other JS includes -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>