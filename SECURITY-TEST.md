# Security Testing Guide

## Vulnerability: CVE-2024-XXXXX - Stored XSS in Header and Footer Scripts <= 2.2.2

### Fixed in Version: 2.2.3

## Manual Testing Steps

### Prerequisites
- WordPress test installation
- User accounts: Admin and Contributor

### Test Case 1: XSS in Post Meta Box (FIXED)

**Attack Vector:** Malicious script injection via textarea escape

**Steps:**
1. Log in as Contributor user
2. Create new post or edit existing post
3. Scroll to "Insert Script to <head>" meta box
4. Enter the following payload:
   ```html
   </textarea><img src=x onerror=alert('XSS-VULNERABLE')>
   ```
5. Save the post
6. Log out and log in as Administrator
7. Edit the same post

**Expected Result (SECURE):**
- ✓ No alert box appears
- ✓ Textarea displays escaped HTML: `&lt;/textarea&gt;&lt;img...`
- ✓ View source shows HTML entities, not raw HTML

**Vulnerable Result (if not fixed):**
- ✗ Alert box appears with 'XSS-VULNERABLE'
- ✗ Image element breaks out of textarea

### Test Case 2: Script Functionality (Should Still Work)

**Purpose:** Verify legitimate scripts still function correctly

**Steps:**
1. Log in as Administrator
2. Go to Settings → Header and Footer Scripts
3. In "Scripts in header" field, enter:
   ```html
   <!-- Test Comment -->
   <script>console.log('Header script works');</script>
   ```
4. Save settings
5. Visit the front-end of the site
6. Open browser console

**Expected Result:**
- ✓ Console shows: "Header script works"
- ✓ Script executes on front-end (legitimate use case)

### Test Case 3: Post-Level Script Injection

**Steps:**
1. Log in as Administrator (or Editor with appropriate permissions)
2. Edit a post
3. In "Insert Script to <head>" meta box, enter:
   ```html
   <script>console.log('Post-level script works');</script>
   ```
4. Publish/Update the post
5. View the post on front-end
6. Check browser console

**Expected Result:**
- ✓ Console shows: "Post-level script works"
- ✓ View page source - script appears in `<head>` section

## Automated Testing

### Using WPScan

```bash
# Scan for known vulnerabilities
wpscan --url http://your-test-site.local --enumerate vp

# Force update database
wpscan --update
```

### Using Patchstack

1. Install Patchstack plugin on test site
2. Let it scan the installation
3. Verify version 2.2.3 is recognized as patched

## Code Review Checklist

- [x] `inc/meta.php` uses `esc_textarea()` for user input display
- [x] Options page (`inc/options.php`) uses `esc_html()` for display
- [x] Nonce verification exists in `shfs_post_meta_save()`
- [x] Capability checks exist (`current_user_can()`)
- [x] Version bumped to 2.2.3

## Additional Security Considerations

### Current Security Measures:
- ✓ Nonce verification for post meta saves
- ✓ Capability checks (edit_post, edit_page)
- ✓ Output escaping in admin interface
- ✓ Input trimming in registration

### Recommendations for Future:
- Consider adding `unfiltered_html` capability check for script insertion
- Add sanitization callback for registered settings
- Consider Content Security Policy headers

## References

- Patchstack Advisory: https://patchstack.com/database/vulnerability/header-and-footer-scripts/
- WordPress Escaping: https://developer.wordpress.org/apis/security/escaping/
- esc_textarea() Documentation: https://developer.wordpress.org/reference/functions/esc_textarea/
