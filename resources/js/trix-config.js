document.addEventListener('trix-attachment-add', function(event) {
    if (event.attachment.file) {
        const formData = new FormData();
        formData.append('file', event.attachment.file);

        axios.post('/attachments', formData)
            .then(response => {
                event.attachment.setAttributes({
                    url: response.data.url,
                    id: response.data.id
                });
            })
            .catch(error => {
                console.error(error);
                event.attachment.remove();
            });
    }
});
