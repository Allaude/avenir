<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Uploading extends CI_Controller {
 
    private $_uploaded;
 
    public function index()
    {
        $this->load->helper('form');
        $data['title'] = 'Multiple file upload';
 
        // let's consider that the form would come with more fields than just the files to be uploaded. If this is the case, we would need to do some sort of validation. If we are talking about images, the only method of validation for us would be to put the upload process inside a validation callback;
        $this->load->library('form_validation');
        //now we set a callback as rule for the upload field
        $this->form_validation->set_rules('uploadedimages[]','Upload image','callback_fileupload_check');
 
        if($this->input->post())
        {
            if($this->form_validation->run())
            {
                // let's store the new created images' data inside an array for later use
                $created_images = array();
                foreach($this->_uploaded as $key => $source_image)
                {
                    //from each source image we will create two images, the two images' data will be stored as an array for the source image's key
                    $new_images = $this->_image_creation($source_image);
                    $created_images[$key] = $new_images;
                }
                // now let's verify the new images have been created. of course, as always don't do this at home. always output in a view file
                echo '<pre>';
                print_r($created_images);
                echo '</pre>';
                exit;
            }
 
        }
        $this->load->view('upload_form', $data);
    }
 
    public function fileupload_check()
    {
        // retrieve the number of images uploaded;
        $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['uploadedimages'];
 
        // first make sure that there is no error in uploading the files
        for($i=0;$i<$number_of_files;$i++)
        {
            if($_FILES['uploadedimages']['error'][$i] != 0)
            {
                $this->form_validation->set_message('fileupload_check', 'Couldn\'t upload the file(s)');
                return FALSE;
            }
        }
 
        // now, taking into account that there can be more than one file, for each file we will have to do the upload
        for ($i = 0; $i < $number_of_files; $i++)
        {
            $_FILES['uploadedimage']['name'] = $files['name'][$i];
            $_FILES['uploadedimage']['type'] = $files['type'][$i];
            $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['uploadedimage']['error'] = $files['error'][$i];
            $_FILES['uploadedimage']['size'] = $files['size'][$i];
            // we first load the upload library
            $this->load->library('upload');
            // next we pass the upload path for the images
            $config['upload_path'] = FCPATH . 'upload/';
            // also, we make sure we allow only certain type of images
            $config['allowed_types'] = 'gif|jpg|png';
            //now we initialize the upload library
            $this->upload->initialize($config);
            // we retrieve the number of files that were uploaded
            if ($this->upload->do_upload('uploadedimage'))
            {
                $this->_uploaded[$i] = $this->upload->data();
            }
            else
            {
                $this->form_validation->set_message('fileupload_check', $this->upload->display_errors());
                return FALSE;
            }
        }
        return TRUE;
    }
 
    private function _image_creation($image)
    {
        // we make sure we receive an array. if no array is given, return false
        if(!is_array($image) || empty($image))
        {
            return FALSE;
        }
        // also let's make sure IT IS an image
        if($image['is_image']!=1)
        {
            return FALSE;
        }
 
        //let's have an array to return
        $new_images = array();
 
        //some parameters
        $image_width = 620;
        $image_height = 200;
        $thumb_width = 100;
        $thumb_height = 100;
        $thumb_name = '-thumb';
        // let's put the gallery images and thumbnails in a different directory (which will be public, of course... and writable)
        $gallery_path = FCPATH.'media/galleries/';
 
        // PROCESS THE MAIN IMAGE
 
        // load the library
        $this->load->library('image_lib');
        // let's be prepared for any errors we may encounter
        $errors = array();
        // we set the image library that we want to be used
        $config['image_library'] = 'gd2';
        // we will take the source image from the $image array having the same source for the new image and the new thumbnail, we set the source here. of course you could use the new image as source for the thumbnail image, but after you've created the new image
        $config['source_image'] = $image['full_path'];
        // we set maintain_ratio to FALSE because we want do do a crop for the images
        $config['maintain_ratio'] = FALSE;
 
 
        //calculate the source image's ratio
        $source_ratio = $image['image_width'] / $image['image_height'];
        //calculate the ratio of the new image
        $new_ratio = $image_width / $image_height;
        //if the source image's ratio is not the same with the new image's ratio, then we do the cropping. else we just do a resize
        if($source_ratio!=$new_ratio)
        {
            // if the new image' ratio is bigger than the source image's ratio or the new image is a square and the source image's height is bigger than it's width, we will take source's width as the width of the image
            if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1)))
            {
                $config['width'] = $image['image_width'];
                $config['height'] = round($image['image_width']/$new_ratio);
                // now we will tell the library to crop from a certain y axis coordinate so that the new image is taken from the vertical center of the source image
                $config['y_axis'] = round(($image['image_height'] - $config['height'])/2);
                $config['x_axis'] = 0;
            }
            else
            {
                $config['width'] = round($image['image_height'] * $new_ratio);
                $config['height'] = $image['image_height'];
                // now we will tell the library to crop from a certain x axis coordinate so that the new image is taken from the horizontal center of the source image
                $size_config['x_axis'] = round(($image['image_width'] - $config['width'])/2);
                $size_config['y_axis'] = 0;
            }
        }
 
        // how will we name the image? and what if the image name already exists in the gallery?
        $image_path = $gallery_path.$image['file_name'];
        $thumb_path = $gallery_path.$image['raw_name'].$thumb_name.$image['file_ext'];
        $new_file = $image['file_name'];
        $new_thumb = $image['raw_name'].$thumb_name.$image['file_ext'];
        if(file_exists($image_path) || file_exists($thumb_path))
        {
            // we will give it 100 tries. if after 100 tries it can't find a suitable name, then the problem is your imagination in naming the files that you've uploaded
            for($i=1;$i<=100;$i++)
            {
                $new_file = $image['raw_name'].'-'.$i.$image['file_ext'];
                $new_thumb = $image['raw_name'].'-'.$i.$thumb_name.$image['file_ext'];
                if(!file_exists($new_file))
                {
                    $image_path = $gallery_path.$new_file;
                    $thumb_path = $gallery_path.$new_thumb;
                }
            }
        }
        $config['new_image'] = $image_path;
        // for cropping we want 100% image quality
        $config['quality'] = '100%';
 
        //now we initialize the library providing it with the configuration
        $this->image_lib->initialize($config);
        // doing the cropping
        if(!$this->image_lib->crop())
        {
            // if errors occured, we must see what those errors were
            $errors[] = $this->image_lib->display_errors();
        }
 
        //let's clear the setting because we will need the library again
        $this->image_lib->clear();
 
        $config['maintain_ratio'] = TRUE;
        $config['source_image'] = $image_path;
        $config['width'] = $image_width;
        $config['height'] = $image_height;
        //for resising we want 70% image quality
        $config['quality'] = '70%';
        $this->image_lib->initialize($config);
        if(!$this->image_lib->resize())
        {
            $errors[] = $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
 
        $new_images['image'] = array('file_name'=>$new_file,'path'=>$config['new_image'],'errors'=>$errors);
 
        // PROCESS THE THUMBNAIL
 
        // let's reset the errors
        $errors = array();
        // now we will do a reset for some of the $config array
        $config['source_image'] = $config['new_image'];
 
        //calculate the source image's ratio
        $source_ratio = $image['image_width'] / $image['image_height'];
        //calculate the ratio of the new image
        $new_ratio = $thumb_width / $thumb_height;
        //if the source image's ratio is not the same with the thumbnail image's ratio, then we do the cropping. else we just do a resize
        if($source_ratio!=$new_ratio)
        {
            // if the new image' ratio is bigger than the source image's ratio or the new image is a square and the source image's height is bigger than it's width, we will take source's width as the width of the image
            if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1)))
            {
                $config['width'] = $image['image_width'];
                $config['height'] = round($image['image_width']/$new_ratio);
                // now we will tell the library to crop from a certain y axis coordinate so that the new image is taken from the vertical center of the source image
                $config['y_axis'] = round(($image['image_height'] - $config['height'])/2);
                $config['x_axis'] = 0;
            }
            else
            {
                $config['width'] = round($image['image_height'] * $new_ratio);
                $config['height'] = $image['image_height'];
                // now we will tell the library to crop from a certain x axis coordinate so that the new image is taken from the horizontal center of the source image
                $size_config['x_axis'] = round(($image['image_width'] - $config['width'])/2);
                $size_config['y_axis'] = 0;
            }
        }
 
        // we've already set the thumb path when we looked for a name for the image
        $config['new_image'] = $thumb_path;
        // for cropping we want 100% image quality
        $config['quality'] = '100%';
        //now we initialize the library providing it with the configuration
        $this->image_lib->initialize($config);
        // doing the cropping
        if(!$this->image_lib->crop())
        {
            // if errors occured, we must see what those errors were
            $errors[] = $this->image_lib->display_errors();
        }
 
        //let's clear the setting because we will need the library again
        $this->image_lib->clear();
 
        $config['maintain_ratio'] = TRUE;
        $config['source_image'] = $thumb_path;
        $config['width'] = $thumb_width;
        $config['height'] = $thumb_height;
        //for resising we want 70% image quality
        $config['quality'] = '70%';
        $this->image_lib->initialize($config);
        if(!$this->image_lib->resize())
        {
            $errors[] = $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
 
        $new_images['thumb'] = array('file_name'=>$new_thumb,'path'=>$config['new_image'],'errors'=>$errors);
        //we return the array with the new images
        return $new_images;
    }
}
 
/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */