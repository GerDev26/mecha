function showSection(sectionId) {
    var sections = document.querySelectorAll('.checkboxContainer');
    sections.forEach(function(section) {
        if (section.id === sectionId) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
        }
    });
}