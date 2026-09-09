# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).
## [Unreleased]

### Miscellaneous Tasks

- Update CHANGELOG.md ([`593240c`](https://github.com/velyx-labs/registry/commit/593240c52d478e87c4429c1b75ce3e94f108ee43))
- Update CHANGELOG.md ([`154243d`](https://github.com/velyx-labs/registry/commit/154243d7bcbc8a49e4b8e11449531f656fe53169))
- Update CHANGELOG.md ([`9a2e12d`](https://github.com/velyx-labs/registry/commit/9a2e12d03a4158380fe8345b1d3d7258087c0543))

## [v2.1.3] - 2026-05-24

### Miscellaneous Tasks

- Update CHANGELOG.md ([`03ba64a`](https://github.com/velyx-labs/registry/commit/03ba64ad92480f0319f2033e4e46bb126596a3f2))
- Update CHANGELOG.md ([`9e5c379`](https://github.com/velyx-labs/registry/commit/9e5c379e521b4b7fb1b28cc4f4d40afbf969bcd6))
- Update CHANGELOG.md ([`63ef60b`](https://github.com/velyx-labs/registry/commit/63ef60b4c53129332736e88e8850494190393c38))

## [v2.1.2] - 2026-05-24

### Added

- Revamp UX — unified grey/cyan palette, silent init, spinner consolidation ([`1fca9a8`](https://github.com/velyx-labs/registry/commit/1fca9a88adb5d4f9f58c541fa736f77dc8441248))

### CI/CD

- Add tag-cli workflow to auto-tag on CLI version bump ([`207b8fe`](https://github.com/velyx-labs/registry/commit/207b8fe93149be18302358a7bff1900a0ac35694))

### Miscellaneous Tasks

- Update CHANGELOG.md ([`8a72852`](https://github.com/velyx-labs/registry/commit/8a7285280238d77f533117ae47e2a28e414fcc33))
- Update CHANGELOG.md ([`fe503ba`](https://github.com/velyx-labs/registry/commit/fe503baa5cfb2199b5a3d920adac4d3f23cb8cce))
- Update CHANGELOG.md ([`19becb6`](https://github.com/velyx-labs/registry/commit/19becb6379e303c6d53932cdf691fdab6ecd1a62))
- Update CHANGELOG.md ([`e54f211`](https://github.com/velyx-labs/registry/commit/e54f2110728126782ed9c314e78f0c22e0517d3b))
- Update CHANGELOG.md ([`b2060df`](https://github.com/velyx-labs/registry/commit/b2060df64776afa3783826f92b30ea54a948b5a4))
- Update CHANGELOG.md ([`76f8550`](https://github.com/velyx-labs/registry/commit/76f8550c5ed704e5d4961d35345840689f6877c6))
- Update CHANGELOG.md ([`4cc51a3`](https://github.com/velyx-labs/registry/commit/4cc51a38d89ceee7d5ae26c7dbf55338ee839729))
- Release v2.1.2 — OKLCH themes, new palettes, UX fixes ([`092e9ac`](https://github.com/velyx-labs/registry/commit/092e9aceb6d4968b7f7d1de806c148d204711626))

### Refactored

- Update layout ([`ebcdeaf`](https://github.com/velyx-labs/registry/commit/ebcdeaf7f1ddc4d2bfb44729c4a74c8ff8c05c5c))

## [v2.1.1] - 2026-05-19

### Fixed

- Fix(cli): inline registry URL at build time and improve network error
messages

- Add esbuildOptions.define in tsup.config.ts so VELYX_REGISTRY_URL is
  baked
  into the bundle at compile time — prevents fallback to velyx.test in
  prod
- Change default fallback in environment.ts to the production registry
  URL
- Improve NetworkError messages to show target URL and underlying system
  error
  (e.g. ENOTFOUND, ECONNREFUSED) extracted from TypeError.cause
- Add contextual hints in ErrorHandler for common network failure
  scenarios
- Remove stray debug console.log from http-service.ts ([`ddeb037`](https://github.com/velyx-labs/registry/commit/ddeb0372010c64287e76c8db5b9bcf76adbf7024))

### Miscellaneous Tasks

- Update CHANGELOG.md ([`4d5eaf4`](https://github.com/velyx-labs/registry/commit/4d5eaf4528626d594a515153e6183aa8d44a883d))

## [v2.1.0] - 2026-05-19

### Added

- Set dark mode as default theme ([`8b308ec`](https://github.com/velyx-labs/registry/commit/8b308ecda12c54d3460f91ad1038ef13bde7e2b7))
- Add mobile-friendly navigation drawer for docs sidebar ([`690924d`](https://github.com/velyx-labs/registry/commit/690924de482c11b5df7d37bf72196a7f999b002a))
- Initialize TypeScript project with basic setup ([`d5fd051`](https://github.com/velyx-labs/registry/commit/d5fd05101a18ed967c6322f8d05a235afb26f181))
- Implement add, init, and list commands for Velar CLI ([`2b9faef`](https://github.com/velyx-labs/registry/commit/2b9faef7ffa494e40b8ef9f04c0e82803b440972))
- Implement init command for Velar CLI with theme selection and configuration generation ([`eeff9df`](https://github.com/velyx-labs/registry/commit/eeff9df9faaf209d190cf079a6ce100e021a0021))
- Feat: implement add command with component selection and dependency resolution
feat: add utility functions for file operations, registry management, and requirement checks
feat: define VelarComponentMeta type for component metadata structure
fix: disable no-explicit-any rule in ESLint configuration ([`ea1c8f8`](https://github.com/velyx-labs/registry/commit/ea1c8f862eff477fc8e813f209139df7e860fdb4))
- Enhance add command and improve configuration handling with type safety ([`0dba7e3`](https://github.com/velyx-labs/registry/commit/0dba7e385cdb4755597df0ba88759bba53bf223c))
- Update package manager version and add chalk dependency; enhance add command with error handling and user prompts ([`2ea3c44`](https://github.com/velyx-labs/registry/commit/2ea3c44c1d3e4d85aed0900f846ef20e3b4348ab))
- Refactor init command and improve error handling ([`0f32628`](https://github.com/velyx-labs/registry/commit/0f32628b4c2caf85a6c3b8964d94a175ad3d3565))
- Enhance init command with interactivity detection and improve error logging ([`645d0b4`](https://github.com/velyx-labs/registry/commit/645d0b4555c4df8c71389ec0b86019b3d8f36f41))
- Refactor error handling and logging; enhance package manager detection and configuration management ([`2bec2fc`](https://github.com/velyx-labs/registry/commit/2bec2fc1197032a4fd11d915a88094a6c628b1cf))
- Refactor Alpine.js and Livewire detection functions for improved type safety and clarity ([`b902d8a`](https://github.com/velyx-labs/registry/commit/b902d8a6d7d81ac57c399a321b016196629a06f2))
- Enhance CLI commands with improved documentation and structure ([`61d79fa`](https://github.com/velyx-labs/registry/commit/61d79fa0cc8bd222eb9229086336cd1b96a359f1))
- Refactor CLI architecture, add robust error handling, batch file operations, and theme support ([`25dbb4a`](https://github.com/velyx-labs/registry/commit/25dbb4a5f1518f8072ba371f88f358bc4f78e70b))
- Add preflight checks for Laravel projects, improve CLI init flow, and update scripts ([`36b188f`](https://github.com/velyx-labs/registry/commit/36b188f5c05c62b41c9f8e68d22c6cbddc1058b2))
- Add changeset dependency to package.json and update pnpm-lock.yaml ([`922001e`](https://github.com/velyx-labs/registry/commit/922001e75c2414ea6b4d950f3538943392f484d8))
- Implement dependency management service and refactor related interfaces ([`097ac00`](https://github.com/velyx-labs/registry/commit/097ac00e794ade73df8604fcee6953f567176692))
- Update package.json to define bin entry for velar ([`6b40d78`](https://github.com/velyx-labs/registry/commit/6b40d787f902d062053136082e7109f8a6b7789f))
- Enhance dependency management by adding npm to Composer format conversion and streamline package manager detection ([`379a3f4`](https://github.com/velyx-labs/registry/commit/379a3f4cefbbe33e34bfa85d39767468274991ca))
- Feat: implement VelyxRegistryService for interacting with Velyx Registry API v1 and refactor RegistryService to utilize it
refactor: streamline registry service methods and remove deprecated remote registry utility
fix: enhance error handling in readVelyxConfig function ([`3da1330`](https://github.com/velyx-labs/registry/commit/3da133080fccca28d6ea024643762ef386aeccbf))
- Improve development workflow and code formatting ([`54a5e61`](https://github.com/velyx-labs/registry/commit/54a5e6140a2c485b82b12fbb089e193e32663ec5))
- Add config validation to list command and update registry types ([`2958ec2`](https://github.com/velyx-labs/registry/commit/2958ec2934d5ed3e2f0625d0b7eba9fb8ec79a37))
- Add changesets support and improve CLI documentation ([`5e37a93`](https://github.com/velyx-labs/registry/commit/5e37a93ef3c302a2fecc9331a05347f1c4960980))
- Add MIT License file ([`833a0a1`](https://github.com/velyx-labs/registry/commit/833a0a12c313cb02f79fc2d70bddffc2c2fcbe2c))
- Add Contributor Covenant Code of Conduct ([`41d4bb3`](https://github.com/velyx-labs/registry/commit/41d4bb3abaf4e173ede199a5c5eac8782a09a8af))
- Add contributing guidelines, issue templates, pull request template, and security policy ([`05fec2b`](https://github.com/velyx-labs/registry/commit/05fec2b986273fbbfc93640a3e07d494ab7655cf))
- Add Tailwind CSS v4 @theme inline support to theme generation ([`6cf33e4`](https://github.com/velyx-labs/registry/commit/6cf33e4c38228e234b76fb72abd1af8a16f61c9a))
- Ask user to override existing velyx.css theme file ([`237c55f`](https://github.com/velyx-labs/registry/commit/237c55f5457f92d796ee67b41a213b70d1504a6b))
- Update workflow ([`f0ad562`](https://github.com/velyx-labs/registry/commit/f0ad562e41541100537abf421bb8d2ac23152e9c))

### Fixed

- Use reliable git-cliff installation action in changelog workflow ([`cf06849`](https://github.com/velyx-labs/registry/commit/cf0684964f03c891191b11ad70c0745d1d98ade0))
- Prevent body scroll when sidebar drawer is open and improve drawer scrolling ([`a01e5a6`](https://github.com/velyx-labs/registry/commit/a01e5a655a81fac9de015e29293b78591c873e98))
- Update package name to match the scoped format for better package management ([`1b9a05b`](https://github.com/velyx-labs/registry/commit/1b9a05ba831bef3a49614ff2b57c25fdf9d8fbf8))
- Update package name and repository URL for consistency ([`d07f04d`](https://github.com/velyx-labs/registry/commit/d07f04db86afafbaeb69c2f9753d8b5f93d7a354))
- Allow overwriting existing velyx.css theme file ([`235b627`](https://github.com/velyx-labs/registry/commit/235b6274130666062deb8f49d9be3a5ee9e16006))
- Ensure pnpm version is specified in publish workflow ([`e257a98`](https://github.com/velyx-labs/registry/commit/e257a980a81e3184004ca30949a0296685487ee5))
- Update icon links to use asset helper for consistency ([`777e6a4`](https://github.com/velyx-labs/registry/commit/777e6a44de9456d5dbe82b15b16938b1a10d5d8b))

### Miscellaneous Tasks

- Set up automated changelog generation via GitHub Actions ([`3cecff6`](https://github.com/velyx-labs/registry/commit/3cecff6605b49269ab8c9f53f53148e8f2f74052))
- Update CHANGELOG.md ([`b7180e2`](https://github.com/velyx-labs/registry/commit/b7180e2a36b086f712b422a8e662f0341aa851a3))
- Update CHANGELOG.md ([`1093f34`](https://github.com/velyx-labs/registry/commit/1093f349fead481209114e30af181182ebbf3ac5))
- Update CHANGELOG.md ([`ccce079`](https://github.com/velyx-labs/registry/commit/ccce079c5f3ddb14c91818d5c879fe368fdec6d9))
- Update CHANGELOG.md ([`c42ee3d`](https://github.com/velyx-labs/registry/commit/c42ee3d63b696cda41fb0fe1d90dccdaa8480711))
- Update pnpm-lock.yaml with new dependencies and versionschore: update **pnpm-lock.yaml** with new dependencies and updated package versions ([`803ab6e`](https://github.com/velyx-labs/registry/commit/803ab6e6f906345fac50ed6563d0e6faca94d06c))
- Add coverage directory to .gitignore ([`e8d4290`](https://github.com/velyx-labs/registry/commit/e8d42900c8f707c4bcc47945c4da77f30b3f75f5))
- Add coverage directory to .gitignore ([`be823af`](https://github.com/velyx-labs/registry/commit/be823af09ea7d851828cd48934644074afb77342))
- Integrate `tsc-alias` into build and dev workflows, update TypeScript paths, and adjust ESLint and package configurations ([`7cf4fce`](https://github.com/velyx-labs/registry/commit/7cf4fcef77a5a9a760514d4ff69a376e2d9ba186))
- Clean up debug logs and unused code in add flow ([`0b2ed42`](https://github.com/velyx-labs/registry/commit/0b2ed42555f22e11445e66c628f63090fff00e3a))
- Update changeset ([`191dd8d`](https://github.com/velyx-labs/registry/commit/191dd8d543dc6a8fcb243f02a08269358edf8ff7))
- Add pnpm-workspace and publish workflow for tools/cli ([`233d10e`](https://github.com/velyx-labs/registry/commit/233d10e9a610245a58dd295fb1dce34efb5e2f44))
- Configure Changesets for monorepo releases ([`329cb3c`](https://github.com/velyx-labs/registry/commit/329cb3c1517e943ff5661db065b58e4a91e048c2))
- Update tools/cli repository URL to velyx ([`8e2812d`](https://github.com/velyx-labs/registry/commit/8e2812d1dcf8ffaabf85f4379589d701633ce299))
- Update CHANGELOG.md ([`0956176`](https://github.com/velyx-labs/registry/commit/0956176b0ccc1992b0f60a206af258222a6c2adb))
- Update version to 2.1.0 and add new components to CHANGELOG.md ([`25977c2`](https://github.com/velyx-labs/registry/commit/25977c26332bfaa971b9ab951b9cf875091f65a9))
- Update CHANGELOG.md ([`cef3a07`](https://github.com/velyx-labs/registry/commit/cef3a07c2576683b914404884ce50d6b1d22e6b3))
- Update CHANGELOG.md ([`fb712e6`](https://github.com/velyx-labs/registry/commit/fb712e6f1d15630aafa96ab34090bbd55b48854b))
- Update CHANGELOG.md ([`c2a05fa`](https://github.com/velyx-labs/registry/commit/c2a05fade2d148af84c66ee5866b8980b7927160))

### Refactored

- Update Livewire component paths in base layout ([`344494e`](https://github.com/velyx-labs/registry/commit/344494e150e4d25ab9c821483aa032442aa6d97b))
- Standardize file and import naming to kebab-case, update service references, and improve code formatting ([`136e02d`](https://github.com/velyx-labs/registry/commit/136e02d586984915059ce639e7954ac802463be1))
- Remove unused preFlightInit import from init.ts ([`e67adf4`](https://github.com/velyx-labs/registry/commit/e67adf465d884ef19c591aec7a2eac81c3d2b31f))
- Simplify mock implementation signatures in css utility tests ([`1fdfd3f`](https://github.com/velyx-labs/registry/commit/1fdfd3f2dddf1413300c1921b8d171fa9b8278a4))
- Reorganize package.json structure for clarity and consistency ([`7e23f8e`](https://github.com/velyx-labs/registry/commit/7e23f8e3957ca98892f22ff3cd577674d5df0a72))
- Standardize string quotes to single quotes across utility files ([`80ec57c`](https://github.com/velyx-labs/registry/commit/80ec57cc60f6f5f237fe099f3c8cdaa2e166d54f))
- Remove Livewire support and related checks from initialization logic ([`b3b5c92`](https://github.com/velyx-labs/registry/commit/b3b5c92b4f363c8c2018bcdddb439cf6c72c7b19))
- Align add command with Velyx Registry API v1 structure ([`f95ca49`](https://github.com/velyx-labs/registry/commit/f95ca496399972e07b00543b32400a8b5c24101e))
- Remove unused accordion and avatar components; update Alpine.js dependency ([`5b5a921`](https://github.com/velyx-labs/registry/commit/5b5a9216913eb898d6d5ce83f50e4463d48a2026))
- Update avatar-group component to use new avatar structure and improve preview view tests ([`8ca86ce`](https://github.com/velyx-labs/registry/commit/8ca86cefb4bd10f3f754143b23ea3b38b4399b50))
- Remove unused components from ComponentShowTest ([`3662bcd`](https://github.com/velyx-labs/registry/commit/3662bcd9f692344c4f84f455b15cfd811b7b6d87))
- Streamline publish workflow and improve Node.js setup ([`2b6c568`](https://github.com/velyx-labs/registry/commit/2b6c5681e17d1140fdc759a90b68276eb9e7d09b))

### Testing

- Add unit tests for core services and utilities ([`2d80d14`](https://github.com/velyx-labs/registry/commit/2d80d14e1ee60660f4cd965f70ec309a790357fd))
- Add unit tests for error handling and new methods in InitService and RegistryService ([`41dc1b5`](https://github.com/velyx-labs/registry/commit/41dc1b5c5194a7f7250841bcd4ed6b2fa0b27f56))
- Add unit tests for config, css, package manager, requirements, tailwind, and theme utilities ([`3b7d912`](https://github.com/velyx-labs/registry/commit/3b7d912a46cf7a96d740ca2c536e343bfea8ed9b))
- Add unit tests for errors, HttpService, list command, and remote-registry utilities ([`022705a`](https://github.com/velyx-labs/registry/commit/022705a6fbce73522bb3937e2f81cbdb88dd1880))
- Add and update unit tests for AddService, ComponentService, ConfigManager, FileSystemService, InitService, and RegistryService ([`7e0d490`](https://github.com/velyx-labs/registry/commit/7e0d490b95089a85513d655c30aed915d41fd188))
- Update and refactor unit tests across InitService, HttpService, and ComponentService ([`7905e02`](https://github.com/velyx-labs/registry/commit/7905e0276930d6af1ad667216a32fd17fc0c654f))
- Relocate and refactor ListService tests for consistency and maintainability ([`3dded19`](https://github.com/velyx-labs/registry/commit/3dded193c6af5aaf8d462ba8c78b51e90de525fb))
- Add unit tests for css utilities and improve tsconfig path handling in vitest config ([`f701b56`](https://github.com/velyx-labs/registry/commit/f701b5678201d71c38e79ae6f8be4ef2a997352c))
- Add integration/e2e coverage and clean unused CLI options ([`2e8c6a5`](https://github.com/velyx-labs/registry/commit/2e8c6a5823310fd5ffc17c98ac2b56af88baf3e6))
- Test release ([`95fb972`](https://github.com/velyx-labs/registry/commit/95fb9723df66b2c7b0f415e05f2cd6de79f15ace))
- Test release ([`2f6d32c`](https://github.com/velyx-labs/registry/commit/2f6d32c73174453abbe2f66495d924a16a5f5ed0))
- Test release ([`0d40fe9`](https://github.com/velyx-labs/registry/commit/0d40fe9c2d85944bb525a2611359daf6464d0aef))

## [v1.0.0] - 2026-05-17

### Added

- Implement Velyx Registry API v1 with versioned component structure ([`97eb13a`](https://github.com/velyx-labs/registry/commit/97eb13a0fc9ed0083dd9f17ac1e68c00d4716927))
- Add landing page and component registry ([`908ecfc`](https://github.com/velyx-labs/registry/commit/908ecfc8bd18e63d720c16bb92f64e868c1ad255))
- Add Livewire configuration file and update component styles; remove deprecated button component ([`6a9e17c`](https://github.com/velyx-labs/registry/commit/6a9e17c05c1425ac3a47ae7705619b690e6dfeaa))
- Enhance landing page with new design elements, animations, and improved SEO metadata ([`424f6f9`](https://github.com/velyx-labs/registry/commit/424f6f9fa201c5d09205065c1385b065c20b240a))
- Revamp landing page layout, enhance header and footer components, and implement dark mode toggle functionality ([`f0756b2`](https://github.com/velyx-labs/registry/commit/f0756b2499194dafc7c708afd9bef332a8a8c1b0))
- Add torchlich for markdown preview ([`490d20f`](https://github.com/velyx-labs/registry/commit/490d20f233bd268c46ad897bc18f32f16725a028))
- Implement dynamic header with dark mode toggle and mobile menu; simplify footer ([`532fffc`](https://github.com/velyx-labs/registry/commit/532fffc978959b154fe70d04841269aeeb2519eb))
- Update font styles and enhance landing page layout for improved readability and aesthetics ([`57994c9`](https://github.com/velyx-labs/registry/commit/57994c9866b92eaaf731ac3049e8ba54c34a7de2))
- Add comprehensive documentation for Velyx including accessibility, installation, introduction, and theming ([`9c927f3`](https://github.com/velyx-labs/registry/commit/9c927f344a682c0faab7c5061a4c867654539a2d))
- Add categories to component metadata for improved organization and filtering ([`167dd03`](https://github.com/velyx-labs/registry/commit/167dd037f32b59bf9ef6b3b309994850fad70471))
- Add blade file references to component metadata for improved integration ([`1e9d5d7`](https://github.com/velyx-labs/registry/commit/1e9d5d76590f36037d3f930db94185122f17b9b2))
- Enhance component index response with additional metadata and file details ([`5afcde5`](https://github.com/velyx-labs/registry/commit/5afcde5cfb751e9eb28cbedb6b84f25fb1add753))
- Refactor component data handling and remove unused tab components ([`71d1cb7`](https://github.com/velyx-labs/registry/commit/71d1cb7d42282d2ba325265fa0680ea1c4a14cd9))
- Add tab component structure with dynamic tab handling and blade file integration ([`794b168`](https://github.com/velyx-labs/registry/commit/794b16889423a7e03e75bc46c312ff55e1be9a90))
- Add MIT License file to the repository ([`bd0bf4a`](https://github.com/velyx-labs/registry/commit/bd0bf4a5c1b6090e1f7a7731f04753c4615c2326))
- Bump version to 1.0.3 in velyx.json ([`4c1f524`](https://github.com/velyx-labs/registry/commit/4c1f524f8ecb09a2a693d2f22273d8b6bec2d9df))
- Add Contributor Covenant Code of Conduct to the repository ([`59996ad`](https://github.com/velyx-labs/registry/commit/59996ad45e1b6c0599e681d0922f88f5a48c5390))
- Add contributing guidelines and development setup instructions ([`d99a709`](https://github.com/velyx-labs/registry/commit/d99a70965c35e53d089215f0627bf5d8aaa66ab2))
- Add pull request template for consistent contributions ([`911e53d`](https://github.com/velyx-labs/registry/commit/911e53d79fb6e06179995f3cb6fe057708781414))
- Add security policy document outlining vulnerability reporting and best practices ([`522776b`](https://github.com/velyx-labs/registry/commit/522776b50c29d08851d21ce122353335e94864fe))
- Add bug report template to improve issue tracking and resolution ([`142c2b3`](https://github.com/velyx-labs/registry/commit/142c2b3a8d752a31a39caf8f2e7f098c9935a2a6))
- Add feature request template to streamline suggestions and enhancements ([`b9c9b6d`](https://github.com/velyx-labs/registry/commit/b9c9b6d212eddedadd0897f90744eaedb8845ce4))
- Add previews for various UI components including alerts, buttons, drawers, modals, dropdowns, and more ([`08bce41`](https://github.com/velyx-labs/registry/commit/08bce412ed10707df6200441a94ba1755c176dca))
- Enhance preview component functionality with dynamic view resolution and normalization methods ([`4125530`](https://github.com/velyx-labs/registry/commit/41255302275cf151069ac9be5db60e2761a4b318))
- Update environment configuration and enhance preview component with color scheme support ([`9e52881`](https://github.com/velyx-labs/registry/commit/9e52881d807dbf6894e162a02dddcb60bbde679f))
- Enhance accordion component with improved styling and accessibility features ([`84287ab`](https://github.com/velyx-labs/registry/commit/84287ab6fff2d486bf3225b3d86ae0a7f4ccc95c))
- Enhance accordion component with additional data attributes for improved accessibility ([`6356c3b`](https://github.com/velyx-labs/registry/commit/6356c3b8ad7ffa9350cfef245d3fd3b79565325e))
- Refactor accordion component structure and enhance functionality with new item and trigger components ([`1f115ae`](https://github.com/velyx-labs/registry/commit/1f115aec2076b746dff17d09537546d8c762ec6e))
- Add alert and avatar components with preview integration; remove unused preview controls ([`c47e8d8`](https://github.com/velyx-labs/registry/commit/c47e8d81212c56f55d7d4096026410a631f3e9b8))
- Add avatar-group and badge components with dedicated preview views ([`d891d64`](https://github.com/velyx-labs/registry/commit/d891d649dea3384fbd7cc1f48a743870d93e89bf))
- Simplify PreviewComponentController and enhance badge component with new 'destructive' variant; add breadcrumbs component with preview ([`2b1a358`](https://github.com/velyx-labs/registry/commit/2b1a358ca08f7708d6b4fa17f7edbf5e04b7fc96))
- Enhance button component with additional props and update preview layout ([`01eff02`](https://github.com/velyx-labs/registry/commit/01eff024778ca568eb579deea4b82a0e54646737))
- Add composable card component with header, content, footer, action, title, and description slots; include preview view ([`b99c224`](https://github.com/velyx-labs/registry/commit/b99c224cc621bb531103de9149bcb95204f4b0ce))
- Add code snippet component with syntax highlighting, line numbers, and copy functionality; include styles and scripts for enhanced UI ([`cccc000`](https://github.com/velyx-labs/registry/commit/cccc0007991bd69977a47ff6bc382f5e8f5641ee))
- Refactor code snippet component into code block component with enhanced styling and functionality; update related files and imports ([`e65783c`](https://github.com/velyx-labs/registry/commit/e65783c6a2c6aaca6581185326d15e375a1dce45))
- Replace code-snippet component with code-block component; update related files, imports, and styles for improved functionality and syntax highlighting ([`e57f977`](https://github.com/velyx-labs/registry/commit/e57f9777418e5d7dfe66974c8d8e661045ddcae1))
- Implement markdown viewer component with syntax highlighting, copy functionality, and enhanced styling; update related files and configurations ([`e2dfe85`](https://github.com/velyx-labs/registry/commit/e2dfe852127b30c2a1d1925a83587502597ce519))
- Add CI/CD workflow for linting, testing, building, and deployment ([`f6f62b9`](https://github.com/velyx-labs/registry/commit/f6f62b915e215fb01e220fdccd8018aeb7df588e))
- Enhance CI/CD workflow by adding pnpm setup and conditional installation ([`d9ea759`](https://github.com/velyx-labs/registry/commit/d9ea759470ee4ac5cf5b2ce63615516b900c6f2c))
- Implement command palette component with keyboard navigation and preview integration ([`d4b7b56`](https://github.com/velyx-labs/registry/commit/d4b7b560487b05b63466f94a3d807e38a7c8435e))
- Restructure data-table component by splitting into multiple blade files and updating related references ([`3f5626f`](https://github.com/velyx-labs/registry/commit/3f5626fc48ee1189a8fa67c512285cc1121e64e7))
- Add date-picker component with integration and preview view ([`c613d02`](https://github.com/velyx-labs/registry/commit/c613d0248e74a043f1f4aea368b67bcf88968f81))
- Implement drawer component with multiple subcomponents and preview integration ([`0268894`](https://github.com/velyx-labs/registry/commit/0268894368a1dca8e9e9b00119fc09c3e2d25e98))
- Refactor date-picker component structure into multiple files and update references ([`4c4d06b`](https://github.com/velyx-labs/registry/commit/4c4d06b95ce9c10513526799535c23df39756730))
- Replace modal component with dialog component ([`c40450f`](https://github.com/velyx-labs/registry/commit/c40450fa07186a79b814ea3061b52b83b99950e8))
- Add new UI components for file upload, keyboard shortcuts, labels, progress bars, ratings, toasts, and empty states ([`f06d780`](https://github.com/velyx-labs/registry/commit/f06d7802a9ef527f53b347bfd3ba1fc804bf503b))
- Add progress-bar, rating, and toast components with dedicated preview views ([`490b02a`](https://github.com/velyx-labs/registry/commit/490b02ab83efb2192ab71b0fcb2a339dd9f5e6d9))
- Add popover component and related preview views; update alert, input, progress-bar, and rating components for improved styling and functionality ([`3016d36`](https://github.com/velyx-labs/registry/commit/3016d360e874ffa312fc707033725d857d3ae34e))
- Add range-slider, skeleton, toggle, and tooltip components with enhanced previews and functionality ([`6debfbe`](https://github.com/velyx-labs/registry/commit/6debfbe2394672ada78d6fa272278946c3c04b6a))
- Add range-slider component with Blade view and JavaScript functionality; update ComponentService and tests for asset handling ([`e0d0647`](https://github.com/velyx-labs/registry/commit/e0d06475073b10d0ee8a8d67bafcce7216db397e))
- Enhance component file retrieval to support nested blade directories and improve asset handling in ComponentService; add tests for nested blade components ([`c36c7eb`](https://github.com/velyx-labs/registry/commit/c36c7ebb252aae20217d57c8f42b38fd292c97b0))
- Implement progress-steps, sortable-list, stat-card, stepper, and timeline components with previews; enhance component file retrieval and add tests for root view exposure ([`9eb6548`](https://github.com/velyx-labs/registry/commit/9eb6548d0c79447254aea6e8eec32ace0f478a3d))
- Update CI/CD workflow to set up pnpm and Node.js with specific versions; add frontend dependencies installation and asset building steps ([`9c39b10`](https://github.com/velyx-labs/registry/commit/9c39b10b70bf4b3a7abf88a96b28b7ebbf24c0ac))
- Add stepper component with navigation functionality and UI integration ([`dcc5a4e`](https://github.com/velyx-labs/registry/commit/dcc5a4e140a080ef99edd9130b3dc8549b4b8b67))
- Add stat card component with dynamic content and styling options ([`47a61a8`](https://github.com/velyx-labs/registry/commit/47a61a87c8d110b3f00112ae722a0792814933b4))
- Add timeline component with vertical and horizontal modes, including dynamic item rendering ([`767276d`](https://github.com/velyx-labs/registry/commit/767276d4a877d92488e9805043557478b8d47965))
- Feat: add tooltip component with show/hide functionality and customizable options
refactor: remove unused range slider component and related files ([`a09099a`](https://github.com/velyx-labs/registry/commit/a09099ab9a3b706917d198a917dd9c0f57474626))
- Implement toggle component with customizable options and Livewire integration ([`8876111`](https://github.com/velyx-labs/registry/commit/8876111da315996572cbe3724a5c910f74af7236))
- Add sortable list component with drag-and-drop functionality ([`70788f1`](https://github.com/velyx-labs/registry/commit/70788f1b4caeac84795355c6319fa8b55d794f12))
- Add sortable list and item components with drag-and-drop functionality ([`06a0a89`](https://github.com/velyx-labs/registry/commit/06a0a89e512995cae3ae941cac287c05a478f746))
- Add sortable list and item components with drag-and-drop support ([`41155cb`](https://github.com/velyx-labs/registry/commit/41155cbc769456ad60ab2173fad31afc3e34d0ff))
- Add sortable list and item components with Livewire integration ([`6b170d5`](https://github.com/velyx-labs/registry/commit/6b170d5c802940a5e9512206bf2718c05eadb902))
- Enhance registry validation command with JSON output and strict mode options ([`72666cd`](https://github.com/velyx-labs/registry/commit/72666cd352ebf32ba81266cdb3a628a9c918e23b))
- Add base model and factories for component installations and projects, update boost.json and providers ([`01d58ea`](https://github.com/velyx-labs/registry/commit/01d58eab587c58f490272497a730ee172f3db409))
- Add installation tracking functionality with API endpoints and database migrations ([`34f8143`](https://github.com/velyx-labs/registry/commit/34f8143f1499c3caba26c78e6fea714d0415c55a))
- Add avatar, stat card, stepper, and timeline components; update styles and versioning ([`06fe2dd`](https://github.com/velyx-labs/registry/commit/06fe2ddcf5e2a12be2644cc40b29cb6c54a1f420))
- Add fortify-development and laravel-best-practices skills ([`d366327`](https://github.com/velyx-labs/registry/commit/d366327d3c3e4b0300e676fccf54d690e6ea5ec0))

### Fixed

- Adjust formatting in DocsController and reorder use statements in web routes ([`ca77a73`](https://github.com/velyx-labs/registry/commit/ca77a73643f9e511d36fcab840c73ef2b681d0fe))
- Update code block syntax from blade to php for accordion documentation ([`d64f04b`](https://github.com/velyx-labs/registry/commit/d64f04b3789ee744e2a655c71f584877e884930a))
- Update code block syntax from blade to php in badge documentation ([`5d8da5b`](https://github.com/velyx-labs/registry/commit/5d8da5b8ac1697bc46247610c2af24d20ef2a3cc))
- Update code block syntax from blade to php in button documentation ([`5129972`](https://github.com/velyx-labs/registry/commit/5129972c430d26277466b13faf102305e3fbd752))
- Update code block syntax from blade to php in documentation files ([`86ed9b4`](https://github.com/velyx-labs/registry/commit/86ed9b4ff1f5a74dcac5501ad12f272d22dfc9c2))
- Correct import path for tabs in app.js ([`39bf188`](https://github.com/velyx-labs/registry/commit/39bf1884cdc0788ed9db0717b953c0c9360382ef))
- Correct formatting in exists method of ComponentService ([`4e1c76c`](https://github.com/velyx-labs/registry/commit/4e1c76ccab3de72ae5098d02fbb4e605bb094fff))
- Correct formatting in exists method of ComponentService ([`ecdc398`](https://github.com/velyx-labs/registry/commit/ecdc398ab281260fe014f25c2f130012fd97097c))
- Remove unnecessary class from accordion item div ([`e898ad3`](https://github.com/velyx-labs/registry/commit/e898ad3fb11ad81c12ee2f11860f872df954b773))
- Format closure syntax in button variant test for consistency ([`cb5686f`](https://github.com/velyx-labs/registry/commit/cb5686f5a0d39f4fb7f981e6fcaf927911f8d273))
- Fix code style ([`1e7e762`](https://github.com/velyx-labs/registry/commit/1e7e76252ffc53cedd4f38a9e934baa967225ee6))
- Correct APP_NAME formatting in .env.example ([`718daaf`](https://github.com/velyx-labs/registry/commit/718daafb6624f34cb32aced588dbd1759eb1bb4d))
- Revert APP_NAME to default value in .env.example ([`0c99a7e`](https://github.com/velyx-labs/registry/commit/0c99a7e4563a3cfaa2e91a970f3620606cc19d2e))
- Reorder pnpm and Node.js setup steps in CI/CD workflow for consistency ([`0fa7635`](https://github.com/velyx-labs/registry/commit/0fa763521894f48ac45f39242015953632ff8378))
- Clean up JSON formatting and improve consistency in various files ([`b1333a7`](https://github.com/velyx-labs/registry/commit/b1333a7422ecef56a8883acee14892a1fcfada0e))
- Remove pnpm workspace ([`22d8b50`](https://github.com/velyx-labs/registry/commit/22d8b50a58efeea402c1a8620c9de84375c37471))
- Improve code formatting and consistency in RegistryValidate.php ([`d539587`](https://github.com/velyx-labs/registry/commit/d5395872f6f083cf2e0d857dc6019ef91e9d6e60))

### Miscellaneous Tasks

- Remove unnecessary blank line before isInteractiveComponent method ([`b54f648`](https://github.com/velyx-labs/registry/commit/b54f6486a2a4a3fb5b358a491995b73141fedfe6))
- Remove unused preview JSON files for alert, button, drawer, markdown viewer, and modal components ([`5eea9f3`](https://github.com/velyx-labs/registry/commit/5eea9f3c95d44723c9e2a35e24da114cada5a65e))

### Refactor

- Remove component views and layout files ([`100d078`](https://github.com/velyx-labs/registry/commit/100d07880f9fc1a04ea9a65af93043c3911692ae))
- Add new documentation pages and update component links ([`25853fa`](https://github.com/velyx-labs/registry/commit/25853fa7fd699670483a90809cad139468180398))

### Refactored

- Remove deprecated user settings components and routes ([`726a843`](https://github.com/velyx-labs/registry/commit/726a843d9655871ae4c27fbea1eb2cce954c81a4))
- Modernize API architecture with form requests, resources, and lazy loading ([`62a0ec9`](https://github.com/velyx-labs/registry/commit/62a0ec9a0fb275af1f068c56a283dd8a66144f74))
- Simplify resolvePreviewView method and update markdown viewer component for consistency ([`f9614b7`](https://github.com/velyx-labs/registry/commit/f9614b7e9771215d26e5ae6e677c1fca24e3c3ee))
- Remove legacy data-table component and replace with new table primitives ([`6bb3b6a`](https://github.com/velyx-labs/registry/commit/6bb3b6a6f917633369559f20b4107fdd5c86221e))
- Replace old dropdown component with new dropdown-menu component ([`e2b0f69`](https://github.com/velyx-labs/registry/commit/e2b0f69d413dd9cf58d140cdeebba4388a24aeff))
- Rename dropdown component to dropdown-menu and update references ([`e4606d9`](https://github.com/velyx-labs/registry/commit/e4606d9effc4407ec339958b9fb3cdc7fc1ce8c1))
- Update dropdown component references to dropdown-menu and remove unused files ([`274c854`](https://github.com/velyx-labs/registry/commit/274c854dd2ef469393a2b1fee2ec709ef6d763b0))
- Rename modal component to dialog and update related files ([`962af18`](https://github.com/velyx-labs/registry/commit/962af1844979d123e06038728a18e81d87e89ab3))
- Improve component metadata retrieval and enhance button preview layout ([`4fd04f6`](https://github.com/velyx-labs/registry/commit/4fd04f65f809889c6cff0709b05dcfceae891589))
- Remove unused props and static-wrapper components from preview ([`c97bc9a`](https://github.com/velyx-labs/registry/commit/c97bc9a8e2e3e9071d8cd23ca51ef4fbe5995b94))
- Streamline toast management methods for improved readability ([`6de9b35`](https://github.com/velyx-labs/registry/commit/6de9b352bfca29bbdcabba91120ebe3980906a1a))
- Remove installation tracking endpoints and improve stepper layout ([`ad33aa2`](https://github.com/velyx-labs/registry/commit/ad33aa23953a8bde3c3d207b9bde7d557c1e2d37))

<!-- Links -->
[v2.1.3]: https://github.com/velyx-labs/registry/compare/v2.1.2...v2.1.3
[v2.1.2]: https://github.com/velyx-labs/registry/compare/v2.1.1...v2.1.2
[v2.1.1]: https://github.com/velyx-labs/registry/compare/v2.1.0...v2.1.1
[v2.1.0]: https://github.com/velyx-labs/registry/compare/v1.0.0...v2.1.0
[v1.0.0]: https://github.com/velyx-labs/registry/compare/...v1.0.0

