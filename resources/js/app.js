import "./utils/clipboard";

import accordion from "./ui/accordion";
import alert from "./ui/alert";
import commandPalette from "./ui/command-palette";
import datePicker from "./ui/date-picker";
import dialog from "./ui/dialog";
import drawer from "./ui/drawer";
import dropdownMenu from "./ui/dropdown-menu";
import fileUpload from "./ui/file-upload";
import input from "./ui/input";
import popover from "./ui/popover";
import rangeSlider from "./ui/range-slider";
import rating from "./ui/rating";
import sortableListItem from "./ui/sortable-list/item";
import sortableList from "./ui/sortable-list/list";
import stepper from "./ui/stepper";
import tabs from "./ui/tabs";
import timeline from "./ui/timeline";
import toast from "./ui/toast";
import toggle from "./ui/toggle";
import tooltip from "./ui/tooltip";

import { Alpine, Livewire } from "../../vendor/livewire/livewire/dist/livewire.esm";
import Prism from "prismjs";
import "prismjs/components/prism-markup";
import "prismjs/components/prism-markup-templating";
import "prismjs/components/prism-bash";
import "prismjs/components/prism-css";
import "prismjs/components/prism-javascript";
import "prismjs/components/prism-jsx";
import "prismjs/components/prism-typescript";
import "prismjs/components/prism-tsx";
import "prismjs/components/prism-json";
import "prismjs/components/prism-yaml";
import "prismjs/components/prism-php";
import "prismjs/components/prism-markdown";

const alpineFactories = {
    accordion,
    alert,
    commandPalette,
    datePicker,
    dialog,
    drawer,
    dropdownMenu,
    fileUpload,
    input,
    popover,
    rangeSlider,
    rating,
    sortableList,
    sortableListItem,
    stepper,
    tabs,
    timeline,
    toast,
    toggle,
    tooltip,
};

function registerAlpineData(alpine = Alpine) {
    Object.entries(alpineFactories).forEach(([name, factory]) => {
        window[name] = factory;
        alpine.data(name, factory);
    });
}

function preferredTheme() {
    const savedTheme = localStorage.getItem("theme");

    if (savedTheme === "dark" || savedTheme === "light") {
        return savedTheme;
    }

    return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
}

function hasExplicitTheme() {
    const saved = localStorage.getItem("theme");

    return saved === "dark" || saved === "light";
}

function applyTheme(theme = preferredTheme()) {
    document.documentElement.classList.toggle("dark", theme === "dark");
    document.documentElement.dataset.theme = theme;
}

function initDarkMode() {
    const toggles = document.querySelectorAll(".dark-mode-toggle");
    applyTheme();

    toggles.forEach((toggle) => {
        if (toggle.dataset.darkModeInitialized === "true") return;

        toggle.dataset.darkModeInitialized = "true";
        toggle.addEventListener("click", (event) => {
            const newTheme = preferredTheme() === "dark" ? "light" : "dark";
            const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

            const applyThemeChange = () => {
                localStorage.setItem("theme", newTheme);
                applyTheme(newTheme);
            };

            if (!prefersReducedMotion && document.startViewTransition) {
                const { clientX: x, clientY: y } = event;
                const root = document.documentElement;

                root.style.setProperty("--x", `${x}px`);
                root.style.setProperty("--y", `${y}px`);
                document.startViewTransition(() => applyThemeChange());
            } else {
                applyThemeChange();
            }
        });
    });
}

async function initDocSearch() {
    const docsearchContainer = document.getElementById("docsearch");
    if (!docsearchContainer || docsearchContainer.dataset.initialized === "true") return;

    const appId = docsearchContainer.dataset.appId;
    const indexName = docsearchContainer.dataset.indexName;
    const apiKey = docsearchContainer.dataset.apiKey;

    if (!appId || !indexName || !apiKey) return;

    const { default: docsearch } = await import("@docsearch/js");

    docsearch({
        container: "#docsearch",
        appId,
        indexName,
        apiKey,
        placeholder: "Search docs...",
        translations: {
            button: {
                buttonText: "Search",
                buttonAriaLabel: "Search documentation",
            },
            modal: {
                searchBox: {
                    resetButtonTitle: "Clear the query",
                    cancelButtonText: "Close",
                    cancelButtonAriaLabel: "Close search",
                },
            },
        },
    });

    docsearchContainer.dataset.initialized = "true";
}

function initCodeCopyButtons() {
    const codeBlocks = document.querySelectorAll(".prose pre");

    codeBlocks.forEach((block) => {
        if (!(block instanceof HTMLElement)) return;
        if (block.querySelector(".copy-button") || block.closest(".no-copy-button")) return;

        const button = document.createElement("button");
        button.className =
            "copy-button cursor-pointer absolute top-2 right-2 p-2 rounded-md bg-muted hover:bg-muted-foreground/20 text-muted-foreground hover:text-foreground transition-opacity opacity-50 group-hover:opacity-100";
        button.innerHTML =
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path></svg>';
        button.setAttribute("aria-label", "Copy code");

        block.classList.add("group", "markdown-viewer__code-block");

        button.addEventListener("click", async () => {
            const code = block.querySelector("code");
            const text = code?.textContent ?? "";

            try {
                await navigator.clipboard.writeText(text);
                button.classList.add("bg-green-500", "text-white");
                button.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>';

                setTimeout(() => {
                    button.classList.remove("bg-green-500", "text-white");
                    button.innerHTML =
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path></svg>';
                }, 2000);
            } catch (error) {
                console.error("Failed to copy:", error);
            }
        });

        block.appendChild(button);
    });
}

function initDocsUi() {
    registerAlpineData(window.Alpine ?? Alpine);
    initDarkMode();
    void initDocSearch();
    Prism.highlightAll();
    initCodeCopyButtons();
}

window.Alpine = Alpine;
window.Livewire = Livewire;
window.Prism = Prism;
registerAlpineData(Alpine);

document.addEventListener("alpine:init", () => {
    registerAlpineData(window.Alpine ?? Alpine);
});

document.addEventListener("livewire:init", () => {
    registerAlpineData(window.Alpine ?? Alpine);
});

Livewire.start();

function bootVelyx() {
    initDocsUi();

    requestAnimationFrame(() => {
        initDocsUi();
    });
}

applyTheme();

window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {
    if (!hasExplicitTheme()) {
        applyTheme();
    }
});

document.addEventListener("DOMContentLoaded", bootVelyx);
document.addEventListener("livewire:navigated", bootVelyx);
document.addEventListener("livewire:navigate", () => {
    applyTheme();
    registerAlpineData(window.Alpine ?? Alpine);
});
document.addEventListener("livewire:navigating", applyTheme);
