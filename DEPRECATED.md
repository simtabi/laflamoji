# DEPRECATED

> This package is **no longer maintained**. It has been split into two
> focused, Ichava-conformant packages. Please migrate.

## Why deprecated

`simtabi/laflamoji` (a.k.a. `flagmoji`) mixed two concerns -- country
flags and Unicode emojis -- under a single Composer install. It also
relied on `blade-ui-kit/blade-icons` and a 2022-vintage Twemoji asset
set that predates Unicode 15/16/17. The Ichava ecosystem now has its
own icon engine and a clean per-concern pack convention; the two
replacement packages below match that convention.

## Replacement packages

| You were using | Replace with | Notes |
|---|---|---|
| Emojis (`@lamoji('us')`, twemoji SVGs under `resources/assets/media/twemoji/`) | [`ichava/emoji-sets`](https://github.com/ichava/emoji-sets) | Three sets: Twemoji v17 (Unicode 17), OpenMoji color, OpenMoji black. CLDR-categorised. |
| Country flag SVGs (`@laflag('us')`, lipis flag-icons under `resources/assets/media/flags/`) | `ichava/flag-icons` *(landing Phase B)* | Standalone country-flag pack. Same Ichava convention. |

## Migration table

| Old (`flagmoji`) | New (`ichava/emoji-sets`) |
|---|---|
| `@lamoji('us')` | `<x-ichava-emoji-sets::icon name="flags/flag-united-states" />` |
| `@lamoji('1f600')` | `<x-ichava-emoji-sets::icon name="smileys-emotion/grinning-face" />` |
| `<x-laflag name="us-4x3" />` *(emoji-style flag)* | `<x-ichava-emoji-sets::icon name="flags/flag-united-states" />` |
| `<x-laflag name="us-4x3" />` *(SVG country flag)* | `<x-ichava-flag-icons::icon ... />` (Phase B) |
| Codepoint filename `1f600.svg` | Slugged filename `grinning-face.svg` (codepoint -> slug lookup in `codepoints.json`) |

## Why the new packages are better

1. **Modern stack**: PHP 8.3+, Laravel 13, native Ichava engine. No
   `blade-ui-kit/blade-icons` dependency.
2. **Unicode 17 coverage**: ~500 emojis that the 2022 Twemoji vintage
   in this package never had (melting face, jellyfish, shaking head,
   phoenix, etc.).
3. **CLDR categorisation**: emojis live under
   `files/<set>/<smileys-emotion|people-body|...>/` so picker UIs can
   browse cleanly. No more flat directory of 3,577 hex-codepoint files.
4. **Human-readable filenames**: `grinning-face.svg` instead of
   `1f600.svg`. Codepoint index files still ship for technical lookups.
5. **Multi-source**: pick Twitter style, OpenMoji color, or OpenMoji
   black per-render. One Composer install.
6. **Proper attribution**: per-set `ATTRIBUTION.md` makes CC-BY 4.0 /
   CC-BY-SA 4.0 obligations explicit for downstream redistributors.
7. **Separated concerns**: emoji-only users no longer ship the 530
   country-flag SVGs they don't use.

## Asset licences (unchanged across the split)

- Twemoji assets: CC-BY 4.0 (Twitter, Inc. and contributors)
- OpenMoji assets: CC-BY-SA 4.0 (HfG Schwäbisch Gmünd + community)
- lipis flag-icons: MIT

## Composer signal

`composer.json` now declares this package `abandoned` and points
Composer at `ichava/emoji-sets` as the replacement, so anyone running
`composer outdated` or `composer audit` will get the migration hint
automatically.

## Frozen state

No further releases will ship from this repo. The repository is kept
publicly readable for historical reference; consider it archived even
if GitHub's archive flag isn't set yet.
