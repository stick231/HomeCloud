export class FileUploader {
    private dropArea: HTMLElement;
    private fileInput: HTMLInputElement;
    private browseBtn: HTMLButtonElement;
    private fileList: HTMLElement;
    public files: File[] = [];

    constructor() { 
        this.dropArea = document.getElementById('drop-area')!;
        this.fileInput = document.getElementById('file-input') as HTMLInputElement;
        this.browseBtn = document.getElementById('browse-btn') as HTMLButtonElement;
        this.fileList = document.getElementById('file-list')!;

        this.fileInput.setAttribute('webkitdirectory', '');
        this.fileInput.setAttribute('directory', '');

        this.init();
    }

    private init() {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(evt => {
            this.dropArea.addEventListener(evt, e => {
                e.preventDefault(); 
                e.stopPropagation(); 
            });
        });

        ['dragenter', 'dragover'].forEach(evt => {
            this.dropArea.addEventListener(evt, () => this.dropArea.classList.add('drag-over'));
        });
        ['dragleave', 'drop'].forEach(evt => {
            this.dropArea.addEventListener(evt, () => this.dropArea.classList.remove('drag-over'));
        });

        this.dropArea.addEventListener('drop', e => this.handleDrop(e));
        this.browseBtn.addEventListener('click', () => this.fileInput.click());
        this.fileInput.addEventListener('change', () => this.handleFileSelect());
    }

    private handleDrop(e: DragEvent) {
        const droppedFiles = e.dataTransfer?.files;
        if (!droppedFiles) return;

        this.files = Array.from(droppedFiles);
        console.log(this.files)
        this.displayFiles();
    }

    private handleFileSelect() {
        const selectedFiles = this.fileInput.files;
        if (!selectedFiles) return;

        this.files = Array.from(selectedFiles);
        this.displayFiles();
    }

    private displayFiles() {
        this.fileList.innerHTML = '';
        this.files.forEach(file => {
            const li = document.createElement('li');
            li.textContent = file.name;
            this.fileList.appendChild(li);
        });
    }
}