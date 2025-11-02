export class FileUploader {
  private dropArea: HTMLElement;
  private fileInput: HTMLInputElement;
  private browseBtn: HTMLButtonElement;
  private fileList: HTMLElement;
  public file: File | null = null;

  constructor() {
    this.dropArea = document.getElementById('drop-area')!;
    this.fileInput = document.getElementById('file-input') as HTMLInputElement;
    this.browseBtn = document.getElementById('browse-btn') as HTMLButtonElement;
    this.fileList = document.getElementById('file-list')!;

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
    if (!droppedFiles || droppedFiles.length === 0) return;

    this.file = droppedFiles[0]; 
    this.syncFileInput();
    this.displayFile();
  }

  private handleFileSelect() {
    const selectedFiles = this.fileInput.files;
    if (!selectedFiles || selectedFiles.length === 0) return;

    this.file = selectedFiles[0];
    this.displayFile();
  }

  private syncFileInput() {
    if (!this.file) return;
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(this.file);
    (this.fileInput as any).files = dataTransfer.files;
  }

  private displayFile() {
    this.fileList.innerHTML = '';
    if (this.file) {
      const li = document.createElement('li');
      li.textContent = `${this.file.name} (${(this.file.size / 1024).toFixed(1)} KB)`;
      this.fileList.appendChild(li);
    }
  }
}

document.addEventListener('DOMContentLoaded', () => {
  new FileUploader();
});
