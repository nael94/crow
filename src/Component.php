<?php

namespace Corviz\Crow;

use Corviz\Crow\Traits\SelfCreate;

abstract class Component
{
    use SelfCreate;

    /**
     * @var array
     */
    private array $attrs = [];

    /**
     * @var string|null
     */
    private ?string $contents = null;

    /**
     * @var string
     */
    private string $templatesPath;

    /**
     * @return array
     */
    public function getAttrs(): array
    {
        return $this->attrs;
    }

    /**
     * @return string|null
     */
    public function getContents(): ?string
    {
        return $this->contents;
    }

    /**
     * @return string
     */
    public function getTemplatesPath(): string
    {
        return $this->templatesPath;
    }

    /**
     * @param array $attrs
     * @return Component
     */
    public function setAttrs(array $attrs): Component
    {
        $this->attrs = $attrs;
        return $this;
    }

    /**
     * @param string|null $contents
     * @return Component
     */
    public function setContents(?string $contents): Component
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * @param string $templatesPath
     * @return Component
     */
    public function setTemplatesPath(string $templatesPath): Component
    {
        $this->templatesPath = $templatesPath;
        return $this;
    }

    /**
     * @return void
     */
    abstract public function render(): void;

    /**
     * @param string $file
     * @param array $data
     *
     * @return void
     */
    protected function view(string $file, array $data = []): void
    {
        Crow::data('componentRendering', (Crow::data('componentRendering') ?? 0) + 1);
        Crow::render($file, $data, $this->templatesPath);
        Crow::data('componentRendering', Crow::data('componentRendering') - 1);

        if (Crow::data('componentRendering') <= 0) {
            Crow::removeData('componentRendering');
        }
    }
}
