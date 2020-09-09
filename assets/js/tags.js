function toggleSelectedTag(tagName) {
    // toggle button class
    const button = $(`button[data-tag='${tagName}']:first`);
    if (!button) return;
    button.toggleClass('active');

    // get all projects from DOM
    const projects = $('.gallery-item');
    if (!projects) return;

    // get all checked tag names
    let checkedTags = [];
    $('button.tag-button.active').each(function () {
        const buttonTag = $(this).data("tag");
        if (!checkedTags.includes(buttonTag)) {
            checkedTags.push(buttonTag);
        }
    });

    // if no tag is checked, show all
    if (checkedTags.length === 0) {
        projects.each(function () {
            $(this).removeClass('hidden');
        });
        return;
    }

    // each project should have ALL checked tags
    projects.each(function () {
        const projectTags = $(this).data("tags").split(',');
        for (const checkedTag of checkedTags) {
            if (!projectTags.includes(checkedTag)) {
                $(this).addClass('hidden');
                return;
            }
        }
        $(this).removeClass('hidden');
    });
}
